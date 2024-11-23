<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ClubController;

use App\Http\Controllers\HomeController; 




//home route
Route::get('/', [HomeController::class, 'home'])->name('home');



Route::get('login', [LoginController::class, 'loginPage'])->name('login');


Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);


Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Club routes
Route::get('clubs', [ClubController::class, 'main'])->name('clubs.main');


//Authenticated routes
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
    
    //Chat routes
    Route::get('chat', [ChatController::class, 'chatPage'])->name('chat');
    Route::get('chat/{id}', [ChatController::class, 'chat'])->name('chatView'); //This is the one that hold the users conversations






    //posts that are inside the club
    Route::prefix('clubs/{club}')->group(function () {
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

        
        Route::post('posts', [PostController::class, 'save'])->name('posts.save');
       
        Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    });


    Route::get('/calendar', [CalendarController::class, 'calendarPage'])->name('calendar');
});



