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
    <script src="{{ asset('js/convetidor.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="color1">
    <div id="app">

        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">{{ $room->titulo }}</h1>
                            <span class="color-text-a">{{ $room->direccion }}</span>
                        </div>
                    </div>                
                </div>
            </div>
        </section>

        <section class="property-single nav-arrow-b">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img  class="ajustar-img" src="{{  asset("/images/$room->imagen")  }}" alt="">
                        <div class="row justify-content-between">
                            <div class="col-md-5 col-lg-4">
                                <div class="property-price d-flex justify-content-center foo">
                                    <div class="card-header-c d-flex">
                                        <div class="card-box-ico">
                                                                                   
                                            <p class="ion-money titulo-size text-center">{{ $room->precio }} $</p>
                                            <p class="ion-money titulo-size">{{ $dolar }} Bs.</p>
                                        </div>                              
                                    </div>                            
                                </div>

                                <div class="property-summary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d section-t4">
                                                <h3 class="title-d">Información rápida:</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="summary-list">
                                        <ul class="list">
                                            <li class="d-flex justify-content-between">
                                                <strong>Nombre del propietario:</strong>
                                                <span>{{ $room->user->nombre }} {{ $room->user->apellido }}</span>
                                            </li>

                                            <li class="d-flex justify-content-between">
                                                <strong>Correo electrónico:</strong>
                                                <span>{{ $room->user->email }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Número de Teléfono:</strong>
                                                <span>{{ $room->user->telefono }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Dirección:</strong>
                                                <span>{{ $room->direccion }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Tipo de espacio:</strong>
                                                <span class="text-capitalize">{{ $room->roomtypes->nombre }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Disponibilidad para:</strong>
                                                <span>{{ $room->gender->nombre }}</span>
                                            </li>                                
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 section-md-t3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d">
                                            <h3 class="title-d">Detalles de la residencia</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-description">
                                    <p class="description color-text-a">
                                        {{ $room->detalles }}
                                    </p>
                                </div>
                                <div class="row section-t3">
                                    <div class="col-sm-12">
                                        <div class="title-box-d">
                                            <h3 class="title-d">Servicios y Características</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="amenities-list color-text-a">
                                    <ul class="list-a no-margin">
                                        @foreach ($room->services as $service)
                                            <li>{{ $service->nombre }}</li>
                                        @endforeach

                                        @foreach ($room->characteristics as $char)
                                            
                                        @endforeach

                                        @foreach ($room->options as $options)
                                            <li>{{ $options->nombre }}</li>                          
                                        @endforeach                                  
                                    </ul>
                                </div>
                            </div>                            
                        </div>
                    </div>                                         
                </div>                      
            </div>
        </section>
        <div class="margen"></div>         
        <pie></pie>
    </div>
    <script type="text/javascript">
        $('#coin-in, #coin-out').msDropDown();
          </script>
</body>

</html>
