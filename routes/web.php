<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::view('/', 'posts.index')->name('home');
Route::view('login', 'auth.login')->name('login');


Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('/logout', function (Request $request) {

    Auth::logout();


    $request->session()->invalidate();


    $request->session()->regenerateToken();


    return redirect('/login');
})->name('logout');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');