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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>
        
        <div class="margen">
                                
             
            <section class="property-grid grid">
                <div class="container">
                    <div class="row">                     
                        @foreach ($rooms as $room)                 
                            <div class="col-md-4">
                                <div class="card-box-a card-shadow">
                                    <div class="img-box-a">
                                        <img src="{{ asset("/images/$room->imagen") }}" alt="" class="img-a grande">
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-a-content">
                                            <div class="card-header-a">
                                                <h2 class="card-title-a">
                                                    <a href="{{ route('RoomView', $room->slug) }}">{{ $room->titulo }}</a>
                                                </h2>
                                            </div>
                                            <div class="card-body-a">
                                                <div class="price-box d-flex">
                                                    <a href="{{  route('RoomView', $room->slug) }}" class="link-a">
                                                        <span class="price-a">{{ $room->precio }}</span>
                                                    </a>                                                    
                                                </div>                                                
                                            </div>

                                            <div class="card-footer-a">
                                                <ul class="card-info d-flex justify-content-around">
                                                    <li>
                                                        <h4 class="card-info-title">Tipo</h4>
                                                        <span class="text-capitalize">{{ $room->roomtypes->nombre }}
                                                        </span>
                                                    </li>

                                                    <li>
                                                        <h4 class="card-info-title">Género</h4>
                                                        <span>{{ $room->gender->nombre }}</span>
                                                    </li>

                                                    <li>
                                                        <h4 class="card-info-title">Dirección</h4>                                                            
                                                            <span>{{ $room->direccion }}</span>                                                                                         
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div>  
                </div>                                                              
            </section>
        </div>        
        <pie></pie>
    </div>
</body>

</html>
