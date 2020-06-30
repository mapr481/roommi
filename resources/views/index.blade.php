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
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/vendor/scrollreveal/scrollreveal.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
</head>
<body>   
    <div id="app">
        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>               

        <div class="color p-5">
            <div class="container d-flex p-5  mt-5 text-white">
                <h1 class="display-4">Buscar tu espacio no fue más sencillo</h1>
            </div>            
        </div>

        <div class="intro intro-carousel ">
            <div id="carousel" class="owl-carousel owl-theme">
                @foreach ($rooms as $room)
                
                    <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset("/images/$room->imagen") }})">
                        <div class="overlay overlay-a"></div>
                            <div class="intro-content display-table">
                                <div class="table-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="intro-body">                                                 
                                                    <p class="intro-title-top">{{ $room->titulo }}</p>
                                                <h1 class="intro-title mb-4">
                                                {{ $room->direccion }}</h1>
                                                <p class="intro-subtitle intro-price">
                                                    <a href="{{ route('RoomView', $room->slug) }}"><span class="price-a">{{ $room->precio }}$ |
                                                    {{ $convertidor * $room->precio }}Bs.</span></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <pie></pie>
    </div>
         

</body>
</html>
