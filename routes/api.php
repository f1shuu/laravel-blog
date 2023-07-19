<?php

use App\Http\Controllers\PostResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts/{id}', [PostResourceController::class, 'show']);
Route::get('/posts', [PostResourceController::class, 'index']);

Route::post('/posts/create', [PostResourceController::class, 'store']);
