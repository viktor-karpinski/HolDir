<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


Route::get('/', [Controller::class, 'main']);

Route::get('/search/', [Controller::class, 'search']);

Route::get('/login/', [Controller::class, 'viewLogin']);
Route::post('/login/', [Controller::class, 'login'])->name('login');
Route::post('/authtoken/', [Controller::class, 'authtoken'])->name('authtoken');

Route::get('/logout/', [Controller::class, 'logoutRedirect']);

Route::get('/signup/', [Controller::class, 'viewSignup']);
Route::post('/signup/', [Controller::class, 'signup'])->name('signup');

Route::get('/profile/', [Controller::class, 'viewProfile']);
Route::get('/profile/{id}', [Controller::class, 'viewProfile']);
Route::get('/chats/', [Controller::class, 'viewChats']);
Route::get('/settings/', [Controller::class, 'viewSettings']);
Route::post('/changeName/', [Controller::class, 'changeName'])->name('changeName');
Route::post('/changeEmail/', [Controller::class, 'changeEmail'])->name('changeEmail');

Route::get('/upload/', [Controller::class, 'viewUpload']);
Route::post('/upload/', [Controller::class, 'upload'])->name('upload');

Route::get('/article/{id?}', [Controller::class, 'viewArticle']);
Route::get('/delete/{id}', [Controller::class, 'deleteArticle']);
Route::get('/edit/{id?}', [Controller::class, 'viewEditArticle']);
Route::post('/edit/{id?}', [Controller::class, 'editArticle']);
Route::get('/contact/{id}/{notuser}', [Controller::class, 'viewContact']);
Route::post('/contact/{id}/{notuser}', [Controller::class, 'contact']);
Route::get('/contact/get/{id}/{notuser}', [Controller::class, 'reloadMessages']);


Route::get('/about/', [Controller::class, 'about']);

Route::get('/impressum/', [Controller::class, 'impressum']);
Route::get('/datenschutz/', [Controller::class, 'datenschutz']);
Route::get('/agb/', [Controller::class, 'agb']);
Route::get('/hilfe/', [Controller::class, 'help']);
