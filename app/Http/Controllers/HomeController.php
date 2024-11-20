<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    //return home view with global posts
    public function home()
    {
        //Home will have only global posts

        $globalPosts = Post:: allGlobalPosts()
            ->orderByDesc('created_at')
            ->get();
        
        return view('home', compact('globalPosts'));
    }
}