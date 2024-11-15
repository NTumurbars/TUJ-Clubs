<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.profile_edit', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
        ]);
        $user->name =  $request->name;



        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
