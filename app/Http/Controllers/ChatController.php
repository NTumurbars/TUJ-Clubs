<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;




class ChatController extends Controller
{

    public function chatPage()
    {
        return view('chat.inbox');
    }

}