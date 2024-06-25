<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return redirect('post-form');
// });
Route::get('post-form', [PostController::class, 'index']);

Route::get('/csrf-token', [AuthController::class, 'getCsrfToken']);
Route::post('store-form', [PostController::class, 'store']);
//Route::get('api/get', [PostController::class, 'get']);
//Route::post('api/putdata', [PostController::class, 'insertdata']);
