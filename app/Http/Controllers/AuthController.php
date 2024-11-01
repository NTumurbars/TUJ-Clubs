<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validating data

        $fields = $request -> validate(
            [
                'name' => ['required', 'min:4', 'max:255'],
                'username' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email'],
                'password' => ['required', 'min:4', 'confirmed'],
                'birthday' => ['required', 'date', 'after:12 years'],
                ['birthday.after' => 'You need to be older than 12']
            ]
        );

  
        User::create($fields);



        //register (insert into the db)


        //login


        //redirect


        dd($request->username);
    }
}
