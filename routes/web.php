<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::view('/', 'posts.index')->name('home');
Route::view('register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register'])
->name('register');