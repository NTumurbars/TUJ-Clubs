<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;

use Illuminate\Http\Request;

use App\Http\Controllers\ClubController;

use App\Http\Controllers\HomeController; 

use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');


//home route
Route::get('/', [HomeController::class, 'home'])->name('home');



Route::view('login', 'auth.login')->name('login');


Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('/logout', function (Request $request) {

    Auth::logout();


    $request->session()->invalidate();


    $request->session()->regenerateToken();


    return redirect('/login');
})->name('logout');





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
});