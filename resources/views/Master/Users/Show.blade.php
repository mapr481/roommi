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

            <div class="container">                                   
                <div class="form-group ml-5 margen">
                    <section class="intro-single">                                       
                        <div class="row justify-content-md-center" >
                            <div class="col-md-12 col-lg-8">
                                <div class="title-single-box">
                                    <h1 class="title-single text-capitalize">{{ $user->nombre}} {{ $user->apellido  }}</h1>                                                
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="titulo-size">Cédula: </h4>                                    
                                        <p color="black" class="input-size">&nbsp; {{ $user->cedula }}</p>
                                    </div>

                                    <div class="col-md-5">
                                        <h4 class="titulo-size">Fecha de nacimiento: </h4>                                    
                                        <p color="black" class="input-size">&nbsp; {{ Carbon\Carbon::parse($user->nacimiento)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="titulo-size">Número de teléfono: </h4>                                    
                                        <p color="black" class="input-size">&nbsp; {{ $user->telefono }}</p>
                                    </div>  

                                    <div class="col-md-5">
                                        <h4 class="titulo-size">Correo electrónico: </h4>                                    
                                        <p color="black" class="input-size">&nbsp; {{ $user->email }}</p>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="titulo-size">Administrador: </h4>                                    
                                        <p color="black" class="text-capitalize input-size">&nbsp; {{ $user->esAdmin }}</p>
                                    </div>
                                </div> 

                                <div class="row">                                 
                                    <div class="col-md-4 ">
                                        <a href="{{ route('EditUser', $user->id) }}" class="btn boton">Editar</a>
                                    </div>   
                                        
                                    <form method="POST" action="{{ route('DeleteUser', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="col-md-4 ">
                                            <button type="submit" class="btn boton-danger">Eliminar</button>                                              
                                        </div>  
                                    </form>                    
                                </div>                                
                            </div>
                        </div>
                    </section> 

                    <div class="form-group">
                        <h1 class="title-single">Publicaciones</h1>   
                    </div>    
                    @foreach ($rooms as $room)
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="assets/img/property-1.jpg" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="{{ route('PubUser', $room->slug) }}">{{ $room->titulo }}</a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a">{{ $room->precio }}</span>
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
                                                    <h4 class="card-info-title">Servicios</h4>
                                                    @foreach ($room->services as $service)
                                                    <span>{{ $service->nombre }}</span> <br>
                                                    @endforeach                                                    
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
            <pie></pie>
        </div>

        
    </body>
</html>
                                
                                <div class="row">

                                    <div class="col-md-3 ">
                                        <a href="{{ route ('Users') }}" class="text-decoration-none">Volver</a>
                                    </div> 

                                    <div class="col-md-3 ">
                                        <a href="{{ route('AdminUser',$user->id) }}" class="btn boton-success">Ver Publicaciones</a>
                                    </div> 

                                    <div class="col-md-2 ">
                                        <a href="{{ route('EditUser', $user->id) }}" class="btn boton">Editar</a>
                                    </div>

                                    
                                        <form method="POST" action="{{ route('DeleteUser', $user->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="col-md-2 ">
                                                <button type="submit" class="btn boton-danger">Eliminar</button>                                              
                                            </div>  
                                        </form>
                    