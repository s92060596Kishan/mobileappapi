<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::middleware('auth:sanctum')->group(function () {
    // Protected routes requiring authentication
    //Route::post('/putdata', [PostController::class, 'insertdata']);
    // Define more routes here...
});
Route::middleware('checkApiKey')->group(function () {
// Public routes accessible without authentication
Route::post('/putdata', [PostController::class, 'insertdata']);
// Define more routes here...
Route::get('/get', [PostController::class, 'get']);
Route::put('/update', [PostController::class, 'update']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::put('/updateprofile/{id}', [LoginController::class, 'update']);
Route::delete('/delete/{id}', [PostController::class, 'destroy']);

// Route to obtain CSRF token
Route::get('/csrf-token', function (Request $request) {
    return csrf_token();
});
});
