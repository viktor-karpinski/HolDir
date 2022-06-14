@extends('master')

@section('content')
<article id="about" class="lesser">
    <h1>
        {{ $user->name }}
    </h1>
    <br>
    <p>
        <b>
            E-Mail:
        </b>
        {{ $user->email }}
    </p>
    @if ($user->email === Session::get('user'))
        <br>
        <a class="button small" href="/settings/">
            Bearbeiten
        </a>
        <br>
        <br>
        <a class="link" href="/logout/">
            logout
        </a>
    @elseif (Session::get('admin') === 1)
        <br>
        <a class="button small" href="/user/{{ $user->id }}">
            Löschen
        </a>
    @endif
</article>

<article id="article-box">
    @foreach ($articles as $article)
        <a 
            class="article" 
            href="/article/{{ $article->id }}" 
            id="{{ $article->id }}"
            style="background-image: url('{{ asset('article_images/'. $images[$loop->index+1]->name) }}')"
            >
            <div class="place-holder"></div>
            <div class="info-holder">
                <h2>
                    {{ $article->name }}
                </h2>
                <p>
                    {{ $article->price }}€
                </p>
            </div>
        </a>
    @endforeach
</article>
<article id="next-box">
   {{ $articles->render() }}
</article>

<script src="{{ asset('js/article.js') }}"></script>

@endsection