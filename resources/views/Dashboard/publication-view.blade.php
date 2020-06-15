<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ Auth::user() }}">
    <title>{{ config('app.name', 'Roommi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="color">
    <div id="app">

        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>
        <div class=" mt-5 mb-5">
            <div class="container mt-5 mb-5 card col-md-10 borde">
                
                <div class="mt-5">
                    <h1 class="text-center">{{ $room->titulo }}</h1><br><br>
                    <div class=" col-md-6">
                        <h3>Dirección: </h3>
                        <h4 class="text-capitalize">{{ $room->direccion }}</h4>
                    </div>
                    <div class="row col-md-6">
                        <h5>Residencia para {{ $room->gender->nombre }}</h5>
                    </div>
                               
            </div>
        </div>   

        <pie></pie>
    </div>
</body>

</html>
