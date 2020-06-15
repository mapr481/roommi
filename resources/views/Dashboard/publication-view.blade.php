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
<body class="color1">
    <div id="app">

        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>
        
            <div class="container margen card col-md-8 borde">             
                <h1 class="text-center text-capitalize">{{ $room->titulo }}</h1><br><br>
                <div class="row">
                    <div class=" col-md-6">
                        <h3>Dirección: </h3>
                        <h4 class="text-capitalize">{{ $room->direccion }}</h4>
                    </div>

                    <div class="col-md-6 text-right">
                        <h5>Detalles del usuario:</h5>
                        <p><b>{{ $room->user->nombre }} {{ $room->user->apellido }} <br>  Teléfono {{ $room->user->telefono }} </b></p>
                        <p><b>{{ $room->user->email }}</b></p>
                    </div>

            
                </div>

                <div class="col-md-6">
                    <h5>Residencia 
                        @if ($room->gender->id === 3)
                            {{ $room->gender->nombre }}                                                 
                        @else
                            para {{ $room->gender->nombre }}                      
                        @endif                            
                    </h5>
                </div>
                <div class="col-md-5">
                    <h5 class="text-capitalize">{{ $room->roomtypes->nombre }}</h5>
                </div>

                <div class="col-md-12 text-justify">
                    <p>{{ $room->detalles }}</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                        @foreach ($room->services as $service)
                            
                            <p>-{{ $service->nombre }}</p>

                        @endforeach
                    
                    </div>

                
                    <div class="col-md-6">
                        
                        @foreach ($room->characteristics as $char)
                            
                            <p class="text-capitalize">-{{ $char->nombre }}</p>

                        @endforeach
                    
                    </div>

                    <div class="col-md-6">
                        
                        @foreach ($room->options as $options)
                            
                            <p class="text-capitalize">-{{ $options->nombre }}</p>

                        @endforeach
                    
                    </div>

                   
                </div> 
                <div class="col-md-6 text-right">
                    <h5>Precio: {{ $room->precio }}</h5>
                </div>


                      
            </div>
           

        <pie></pie>
    </div>
</body>

</html>
