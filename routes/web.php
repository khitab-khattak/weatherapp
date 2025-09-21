<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get','post'],'/weather',[WeatherController::class,'weather'])->name('weather.form');
