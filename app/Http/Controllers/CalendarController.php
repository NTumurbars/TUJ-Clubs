<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Post;

use App\Models\Calendar;


class CalendarController extends Controller
{

    public function calendarPage()
    {
        $globalPosts = Post:: allGlobalPosts()->whereNotNull('start_date')
            ->orderByDesc('created_at')
            ->get();
        return view('calendar.display',compact( 'globalPosts'));
    }

}