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
<body>
    <div id="app">

        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>
            <div class="margen">
                <list-publication></list-publication>
            <div class="container"> 
                <div class="row">  
                    @foreach ($rooms as $room)
                           
                        <div class="card col-md-5 ml-4 mb-4 borde">    
                            <div class="card-body">                                         
                                    <h4 class="card-title mb-2">{{  $room->titulo }}</h4>        
                                    <p class="card-text">{{ $room->user->nombre }}</p>                                  
                            </div> 
                            <!--
                            <div class="view overlay">
                            <img class="card-img-top rounded-0" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                            </div> -->            
                            <div class="card-body">  
                                <div class="collapse-content">  
                                    <p class="card-text text-truncate d-inline-block" style="max-height: 100px; max-width: 450px;">{{ $room->detalles }}</p>
                                </div> 
                                <a class="btn boton-success" href="{{  route('ShowPublication', $room->slug) }}">Ver publicación</a> 
                            </div>  
                        </div>                                               
                    @endforeach
                </div>
            </div>
        </div>    
        
        <pie></pie>
    </div>
</body>

</html>
