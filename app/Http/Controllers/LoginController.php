<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function logout()

    {

        // Logout the user from the application

        Auth::logout();

        session()->invalidate();

        session()->regenerate();


        // Invalidate and regenerate the session to ensure no old session data persists

        session()->invalidate();

        session()->regenerate();


        // Clear session cookies

        Cookie::queue(Cookie::forget('laravel_session'));

        Cookie::queue(Cookie::forget('laravel_token'));

        Cookie::queue(Cookie::forget('remember_token'));



        return redirect()

            ->route('login')

            ->with('message', 'You have been logged out.')

            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')

            ->header('Pragma', 'no-cache')

            ->header('Expires', '0')

            ->with(['script' => 'window.location.reload();']); // Forces page reload

    }

    public function handleGoogleCallback()
    {
        try {
            $potentialUser = Socialite::driver('google')->user();

            //Named Error Bags

            
            if (!isset($potentialUser->user['hd']) || $potentialUser->user['hd'] !== 'temple.edu') {
                //there is no other way to logout so I just added this in here to debug the welcome banner message and design
        
                return redirect()
                    ->route('login')
                    ->withErrors(['email' => 'You must use temple account to log in.']);
            }

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
                    'remember_token' => $potentialUser->token,
                ],
            );
            Auth::login($user);

            return redirect()->intended('/');
        } catch (\Exception $e) {
            $potentialUser = Socialite::driver('google')->user();
            // dd($potentialUser);
            dd($e->getMessage());
        }
    }

}
