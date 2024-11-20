<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClubController;

use App\Http\Controllers\HomeController; 

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\NoCache;



//home route
Route::get('/', [HomeController::class, 'home'])->name('home');



Route::view('login', 'auth.login')->name('login');


Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Route::post('/logout', function (Request $request) {

//     Auth::logout();


//     $request->session()->invalidate();


//     $request->session()->regenerateToken();


//     return redirect('/login');
// })->name('logout');





Route::get('clubs', [ClubController::class, 'main'])->name('clubs.main');

Route::middleware('auth')->group(function () {


    //Profile routes

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');


    //Club routes. Fucking hell it took me almost 2 hours to figure that there was a wrong ordering in clubs/create. Fuuuuck if clubs/{create} comes before clubs/create it tries to find clubs with create id.
    

    Route::get('clubs/browse', [ClubController::class, 'browse'])->name('clubs.browse');

    Route::get('clubs/create', [ClubController::class, 'create'])->name('clubs.create');

    Route::get('clubs/{club}', [ClubController::class, 'display'])->name('clubs.display');

    Route::get('clubs/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');

    Route::post('clubs', [ClubController::class, 'save'])->name('clubs.save');



    Route::post('clubs/{club}/request-to-join', [ClubController::class, 'requestToJoin'])->name('clubs.requestToJoin');

       
    Route::put('clubs/{club}', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('clubs/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');
    
    Route::get('/chat', function(){
        return view('chat');
    })->name('chat');





    //posts that are inside the club
    Route::prefix('clubs/{club}')->group(function () {
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

        
        Route::post('posts', [PostController::class, 'save'])->name('posts.save');
       
        Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    });
});


Route::post('/logout', [GoogleController::class, 'logout'])->name('logout');

// Route::middleware([NoCache::class, 'auth'])->group(function () {
//     Route::view('/', 'home')->name('home');
//     // Add other routes that require authentication here
// });

// This would prevent an authorized user from entering the url and forcing their way into the application
Route::get('login/google', function () {
    if (Auth::check()) {
        // If the user is authenticated, redirect them to the home/dashboard page
        return redirect()->route('home'); // or 'dashboard'
    }
    return app(GoogleController::class)->redirectToGoogle();
})->name('login.google');