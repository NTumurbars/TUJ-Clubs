<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Calendar;


class CalendarController extends Controller
{

    public function calendarPage()
    {
        return view('calendar.display');
    }

}