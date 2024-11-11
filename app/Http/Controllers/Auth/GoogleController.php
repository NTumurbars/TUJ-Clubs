<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            dd($user);
            // $finduser = User::where('email', $user->email)->first(); // This is sql query for searching ppl inside the db
            // //If found we need to let them access the stuff
            // if ($finduser) {
            //     dd($user);
            //     Auth::login($finduser);//May be they are tryna authenticate the user
            // // This is to redirect the user to a page in this case dashboard
            // } //Else we ask them to use the google service again 
            // else {
            //     dd($user);
            //     $newUser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'google_id'=> $user->id, // might not need it 
            //         'password' => encrypt('123456dummy') //We odnt need it
            //     ]);

            //     Auth::login($newUser);

            // }
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }
}
