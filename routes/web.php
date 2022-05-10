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
Route::get('/settings/', [Controller::class, 'viewSettings']);
Route::post('/changeName/', [Controller::class, 'changeName'])->name('changeName');
Route::post('/changeEmail/', [Controller::class, 'changeEmail'])->name('changeEmail');

Route::get('/upload/', [Controller::class, 'viewUpload']);
Route::post('/upload/', [Controller::class, 'upload'])->name('upload');

Route::get('/article/', [Controller::class, 'viewArticle']);
Route::get('/article/{id}', [Controller::class, 'viewArticle']);

Route::get('/about/', [Controller::class, 'about']);

Route::get('/impressum/', [Controller::class, 'impressum']);

Route::get('/help/', [Controller::class, 'help']);
