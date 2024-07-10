<?php

use App\Http\Controllers\HolidayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar', [HolidayController::class, 'index']);
Route::get('/holidays', [HolidayController::class, 'getHolidays']);
