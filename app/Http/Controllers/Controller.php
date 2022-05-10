<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\Article;
use App\Models\ArticleImages;
use App\Models\PasswordReset;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* ############ ############ VIEWS ############ ############*/

    public function main()
    {
        $articles = Article::orderBy('id', 'desc')->skip(0)->take(10)->get();
        $images = $this->getImages($articles);
        return view('main', ['articles' => $articles, 'images' => $images]);
    }

    public function search(Request $req)
    {
        $type = ($req->input('t') === 'a') ? 1 : 0;
        $articles = Article::where([
            ['name', 'LIKE', '%' . $req->input('s') . '%'],
            ['type', '=', $type]
        ])->skip(0)->take(10)->get();
        $images[] = $images = $this->getImages($articles);
        return view('search', ['articles' => $articles, 'images' => $images]);
    }

    public function viewLogin()
    {
        if ($this->isLoggedIn()) {
            $this->logout();
        }
        return view('login');
    }

    public function viewSignup()
    {
        if ($this->isLoggedIn()) {
            $this->logout();
        }
        return view('signup');
    }

    public function viewProfile($id = null)
    {
        if ($id === null) {
            if ($this->isLoggedIn()) {
                $user = User::where('email', '=', Session::get('user'))->first();
                return $this->giveProfileArticles($user);
            } else {
                return redirect('login');
            }
        } else {
            $user = User::where('id', '=', $id)->first();
            return $this->giveProfileArticles($user);
        }
    }

    public function viewSettings()
    {
        if ($this->isLoggedIn()) {
            $user = User::where('email', '=', Session::get('user'))->first();
            return view('settings', ['user' => $user]);
        } else {
            return redirect('login');
        }
    }

    public function giveProfileArticles($user)
    {
        $articles = Article::where('user_id', '=', $user->id)->orderBy('id', 'DESC')->skip(0)->take(10)->get();
        $images = $this->getImages($articles);
        return view('profile', ['user' => $user, 'articles' => $articles, 'images' => $images]);
    }

    public function getImages($articles)
    {
        $images[] = null;
        foreach ($articles as $article) {
            $images[] = ArticleImages::where('article_id', '=', $article->id)->first();
        }
        return $images;
    }

    public function viewUpload()
    {
        if ($this->isLoggedIn()) {
            return view('upload');
        } else {
            return redirect('login');
        }
    }

    public function viewArticle($id = null)
    {
        $article = Article::where('id', '=', $id)->first();
        $images = ArticleImages::where('article_id', '=', $article->id)->get();
        $user = User::where('id', '=', $article->user_id)->first();
        return view('article', ['article' => $article, 'images' => $images, 'user' => $user]);
    }

    public function about()
    {
        return view('aboutus');
    }
    public function impressum()
    {
        return view('impressum');
    }
    public function help()
    {
        return view('hilfe');
    }

    /* ############ ############ FUNCTIONS ############ ############*/

    public function isLoggedIn()
    {
        if (Session::has('user')) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        if ($this->isLoggedIn()) {
            Session::pull('user');
            Session::flash('forget', '');
        }
    }

    public function logoutRedirect()
    {
        $this->logout();
        return redirect('/')->with(['msg' => 'logged out successfully!']);
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = $req->has('remember') ? true : false;

        $user = User::where('email', '=', htmlspecialchars($req->email))->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                Session::put('user', $user->email);
                if ($remember) {
                    $token = Str::random(100);
                    $user->remember_token = $token;

                    if ($user->save()) {
                        Session::flash('remember', $token);
                    }
                } else {
                    $user->remember_token = null;

                    if ($user->save()) {
                        Session::flash('forget', '');
                    }
                }
                return '1';
            }
        }

        return '2';
    }


    public function authtoken(Request $req)
    {
        $user = User::where([
            ['email', '=', htmlspecialchars($req->user)],
            ['remember_token', '=', htmlspecialchars($req->token)],
        ])->first();
        if ($user) {
            Session::put('user', $user->email);
            $token = Str::random(100);
            $user->remember_token = $token;
            if ($user->save()) {
                Session::flash('remember', $token);
            }
            echo '1';
        } else {
            echo '2';
        }
    }

    public function signup(Request $req)
    {
        $req->validate([
            'name' => 'required|min:4|max:64|regex:/^[a-zA-Z0-9 ]{3,}$/u',
            'email' => 'required|max:64|unique:users,email|email:dns',
            'password' => 'required|min:8|max:64|regex:/^(?=.*?[A-Z])(?=.*?[a-z])[a-zA-Z\d#?!@$%^&*-].{7,}$/u'
        ]);

        $user = new User();
        $user->name = htmlspecialchars($req->name);
        $user->email = htmlspecialchars($req->email);
        $user->password = Hash::make(htmlspecialchars($req->password));

        if ($user->save()) {
            Session::put('user', $user->email);
            return '1';
        }

        return '2';
    }

    public function upload(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|max:64|regex:/^[a-zA-Z0-9üÜöÖäÄ,._#+*!(){}\-;:\\/ ]{3,}$/u',
            'type' => 'required',
            'pictures' => 'required'
        ]);

        $user = User::where('email', '=', Session::get('user'))->first();
        $article = new Article();
        $article->name = htmlspecialchars($req->name);
        $article->description = htmlspecialchars($req->description);
        $article->price = htmlspecialchars($req->price);
        $article->type = htmlspecialchars($req->type);
        $article->user_id = $user->id;

        if ($article->save()) {
            if ($req->hasfile('pictures')) {
                foreach ($req->file('pictures') as $imagefile) {
                    $name = Str::random(100) . '.' . $imagefile->getClientOriginalExtension();
                    $imagefile->move(public_path('/article_images'), $name);
                    $image = new ArticleImages();
                    $image->name = $name;
                    $image->article_id = $article->id;
                    $image->save();
                }
                return '1';
            }
        }

        return '2';
    }

    public function changeName(Request $req)
    {
        if ($this->isLoggedIn()) {
            $user = User::where('email', '=', Session::get('user'))->first();
            if ($user->name !== $req->name) {
                $req->validate([
                    'name' => 'required|min:4|max:64|regex:/^[a-zA-Z0-9 ]{3,}$/u',
                ]);
                $user->name = htmlspecialchars($req->name);
                if ($user->save()) {
                    return '1';
                }
                return '2';
            }
            return '1';
        }
        return '2';
    }

    public function changeEmail(Request $req)
    {
        if ($this->isLoggedIn()) {
            $user = User::where('email', '=', Session::get('user'))->first();
            if ($user->email !== $req->email) {
                $req->validate([
                    'email' => 'required|max:64|unique:users,email|email:dns',
                ]);
                $user->email = htmlspecialchars($req->email);
                if ($user->save()) {
                    Session::put('user', $user->email);
                    return '1';
                }
                return '2';
            }
            return '1';
        }
        return '2';
    }
}
