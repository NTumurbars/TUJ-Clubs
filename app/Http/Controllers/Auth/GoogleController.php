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
            $potentialUser = Socialite::driver('google')->user();

                
            // //Named Error Bags
            // if (!isset($potentialUser->user['hd']) ||$potentialUser->user['hd'] !== 'temple.edu') {
            //     //there is no other way to logout so I just added this in here to debug the welcome banner message and design
            //     Auth::logout();
            //     return redirect()->route('login')->withErrors(['email' => 'You must use temple account to log in.']);
            // }




            //#firstOrCreate
            //The firstOrCreate method is very similar to the firstOrNew method. 
            //It tries to find a model matching the attributes you pass in the first parameter. 
            //If a model is not found, it automatically creates and saves a new Model after applying any attributes passed in the second parameter 
            //source:https://laravel-news.com/firstornew-firstorcreate-firstor-updateorcreate#content-firstorcreate

            $user = User::firstOrCreate(
                ['email' => $potentialUser->email],
                [
                    'name' => $potentialUser->getName(),
                    'profile_photo_link' => $potentialUser->getAvatar(),
                ]
            );

            Auth::login($user);

            return redirect()->intended('/');
        }
        catch (\Exception $e) {
            $potentialUser = Socialite::driver('google')->user();
            // dd($potentialUser);
            dd($e->getMessage());
        }
    }
}


