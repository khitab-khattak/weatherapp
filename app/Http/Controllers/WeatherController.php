<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather(Request $request)
    {
        $weatherResponse=[];

        if ($request->isMethod('post')) {
            $cityName = $request->input('city');

            $response = Http::withHeaders([
                "x-rapidapi-host" => "open-weather13.p.rapidapi.com",
                "x-rapidapi-key"  => "453488be64mshce51cce4e3ba03fp14f966jsn2fb5fb70570c"
            ])->get("https://open-weather13.p.rapidapi.com/city", [
                'city' => $cityName,
                'lang' => 'EN'
            ]);
            $weatherResponse = $response->json();
        }

        return view('weather', compact('weatherResponse'));
    }
}
