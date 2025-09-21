<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-bottom: 60px;
            /* Height of the footer */
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* Height of the footer */
            background-color: #f5f5f5;
        }

        p.card-text {
            margin-top: -10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5 mb-4">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{route('weather.form')}}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">-- Select City --</option>
                            <option value="karachi">Karachi</option>
                            <option value="lahore">Lahore</option>
                            <option value="faisalabad">Faisalabad</option>
                            <option value="wah cantt">Wah Cantt</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="balochistan">Bolochistan</option>
                            <option value="boti">BoTi</option>
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        @if (isset($weatherResponse["weather"][0]['main']) && strtolower($weatherResponse["weather"][0]['main']) == 'clear')
                            <img src="{{ asset('images/clear.png') }}" alt="Clear Weather" width="80">
                        @elseif (isset($weatherResponse["weather"][0]['main']) && strtolower($weatherResponse["weather"][0]['main']) == 'clouds')
                            <img src="{{ asset('images/cloud.png') }}" alt="Cloudy Weather" width="80">
                        @elseif (isset($weatherResponse["weather"][0]['main']) && strtolower($weatherResponse["weather"][0]['main']) == 'smoke')
                            <img src="{{ asset('images/rain.png') }}" alt="Smoky Weather" width="80">
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country:
                            <b>@if (isset($weatherResponse["sys"]['country']))
                                {{ $weatherResponse["sys"]['country']}}
                            @endif</b>
                        </p>
                        <p class="card-text">Name: 
                            <b>@if (isset($weatherResponse["name"]))
                                {{ $weatherResponse["name"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Latitude: 
                            <b>@if (isset($weatherResponse["coord"]['lat']))
                                {{ $weatherResponse["coord"]['lat']}}
                            @endif</b>
                        </p>
                        <p class="card-text">Longitude: 
                            <b>@if (isset($weatherResponse["coord"]['lon']))
                                {{ $weatherResponse["coord"]['lon']}}
                            @endif</b>
                        </p>
                        <p class="card-text">Sunrise: 
                            <b>@if (isset($weatherResponse["sys"]['sunrise']))
                                {{ $weatherResponse["sys"]['sunrise']}}
                            @endif</b>
                        </p>
                        <p class="card-text">Sunset: 
                            <b>@if (isset($weatherResponse["sys"]['sunset']))
                                {{ $weatherResponse["sys"]['sunset']}}
                            @endif</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature &deg; C | &deg; F</h5>
                        <br>
                        <p class="card-text">Temp: 
                            <b>@if (isset($weatherResponse["main"]["temp"]))
                                {{ $weatherResponse["main"]["temp"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Min Temp: 
                            <b>@if (isset($weatherResponse["main"]["temp_min"]))
                                {{ $weatherResponse["main"]["temp_min"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Max Temp: 
                            <b>@if (isset($weatherResponse["main"]["temp_max"]))
                                {{ $weatherResponse["main"]["temp_max"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Feels Like: 
                            <b>@if (isset($weatherResponse["main"]["feels_like"]))
                                {{ $weatherResponse["main"]["feels_like"]}}
                            @endif</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precipitation &percnt;</h5>
                        <br>
                        <p class="card-text">Humidity: 
                            <b>@if (isset($weatherResponse["main"]["humidity"]))
                                {{ $weatherResponse["main"]["humidity"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Pressure: 
                            <b>@if (isset($weatherResponse["main"]["feels_like"]))
                                {{ $weatherResponse["main"]["feels_like"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Sea Level: 
                            <b>@if (isset($weatherResponse["main"]["sea_level"]))
                                {{ $weatherResponse["main"]["sea_level"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Ground Level: 
                            <b>@if (isset($weatherResponse["main"]["grnd_level"]))
                                {{ $weatherResponse["main"]["grnd_level"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Visibility: 
                            <b>@if (isset($weatherResponse["visibility"]))
                                {{ $weatherResponse["visibility"]}}
                            @endif</b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind m/h</h5>
                        <br>
                        <p class="card-text">Speed: 
                            <b>@if (isset($weatherResponse["wind"]["speed"]))
                                {{ $weatherResponse["wind"]["speed"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Degree: 
                            <b>@if (isset($weatherResponse["wind"]["deg"]))
                                {{ $weatherResponse["wind"]["deg"]}}
                            @endif</b>
                        </p>
                        <p class="card-text">Gust: 
                            <b>
                                @if (isset($weatherResponse["wind"]["gust"]))
                                    {{ $weatherResponse["wind"]["gust"] }}
                                @else
                                    N/A
                                @endif
                            </b>
                        </p>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>