<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\TagController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function() {Route::resource('admin/posts', AdminPostController::class);});

Route::get('tags', [TagController::class, 'index'])->middleware('auth');
Route::post('tags', [TagController::class, 'index'])->middleware('auth');

Route::get('tags/create', [TagController::class, 'create'])->middleware('auth');
Route::post('tags', [TagController::class, 'store'])->middleware('auth');
Route::delete('tags/{tag:slug}', [TagController::class, 'destroy'])->middleware('auth');
