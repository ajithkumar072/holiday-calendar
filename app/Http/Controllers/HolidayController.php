<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use ElementorPro\Core\Utils\Collection;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    //
    public function index()
    {
        return view('calendar');
    }

    public function getHolidays()
    {
        $holidays = Holiday::all();
        return response()->json($holidays);
    }
}
