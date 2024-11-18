<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Middleware\NoCache;


Route::view('login', 'auth.login')->name('login');
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Route::post('/logout', function (Request $request) {
//     Auth::logout();

//     return redirect('/login');
// })->name('logout');
Route::post('/logout', [GoogleController::class, 'logout'])->name('logout');

Route::middleware([NoCache::class, 'auth'])->group(function () {
    Route::view('/', 'posts.index')->name('home');
    // Add other routes that require authentication here
});

// This would prevent an authorized user from entering the url and forcing their way into the application
Route::get('login/google', function () {
    if (Auth::check()) {
        // If the user is authenticated, redirect them to the home/dashboard page
        return redirect()->route('home'); // or 'dashboard'
    }
    return app(GoogleController::class)->redirectToGoogle();
})->name('login.google');