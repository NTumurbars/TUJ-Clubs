<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JoinFormController;
use App\Http\Controllers\JoinRequestController;

use App\Http\Controllers\HomeController; 




//home route
Route::get('/', [HomeController::class, 'home'])->name('home');



Route::get('login', [LoginController::class, 'loginPage'])->name('login');


Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);


Route::get('logout', [LoginController::class, 'logout'])->name('logout');





Route::get('clubs', [ClubController::class, 'main'])->name('clubs.main');

Route::middleware('auth')->group(function () {
    
    //Chat routes
    Route::get('/chat', [ChatController::class, 'chatPage'])->name('chat');

    //Calendar
      Route::get('/calendar', [CalendarController::class, 'calendarPage'])->name('calendar');

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
       
    Route::put('clubs/{club}', [ClubController::class, 'update'])->name('clubs.update');

    Route::delete('clubs/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');

    Route::post('clubs/{club}/request-to-join', [ClubController::class, 'requestToJoin'])->name('clubs.requestToJoin');
    
   
    //things that are in the club
    Route::prefix('clubs/{club}')->group(function () {


        //posts
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

        Route::post('posts', [PostController::class, 'save'])->name('posts.save');
       
        Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



        //members
        Route::get('members', [MembershipController::class, 'members'])->name('members');
        Route::get('members/{membership}/edit', [MembershipController::class, 'edit'])->name('members.edit');

        Route::put('members/{membership}', [MembershipController::class, 'update'])->name('members.update');
        Route::delete('members/{membership}', [MembershipController::class, 'removeMember'])->name('members.remove');

        //membership request
        Route::get('memberRequests', [MembershipController::class, 'memberRequests'])->name('memberRequests');




        ///New member join for and requeests

        //the form

        Route::get('join-form', [JoinFormController::class, 'display'])->name('join-form.display');

        Route::get('join-form/edit', [JoinFormController::class, 'edit'])->name('join-form.edit');

        //change join form
        Route::put('join-form', [JoinFormController::class, 'update'])->name('join-form.update');

        // save
        Route::post('join-form', [JoinRequestController::class, 'save'])->name('requests.save');

        Route::get('requests', [JoinRequestController::class, 'main'])->name('requests.main');

        // approve route
        Route::post('requests/{request}/approve', [JoinRequestController::class, 'approve'])->name('requests.approve');

        // reject route
        Route::post('requests/{request}/reject', [JoinRequestController::class, 'reject'])->name('requests.reject');


    });


  
});



