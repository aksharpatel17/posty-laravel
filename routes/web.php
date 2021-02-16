<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

//Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store'])->name('posts');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//Likes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.like');

//userpage
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

//post page
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');


//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Home
Route::get('/', function () {
    return view('home');
})->name('home');
