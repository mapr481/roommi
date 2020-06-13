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

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card border-card">
                            <div class="card-header titulo-size">{{ __('Ver usuario') }} </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    
                                    
                                    <div class="col-md-3">
                                        <h4 class="input-size">Nombre: </h4>
                                        <p color="black" class="text-capitalize">&nbsp; {{ $user->nombre }}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4 class="input-size">Apellido: </h4>                                    
                                        <p color="black" class="text-capitalize">&nbsp; {{ $user->apellido }}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4 class="input-size">Cédula: </h4>                                    
                                        <p color="black">&nbsp; {{ $user->cedula }}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4 class="input-size">Número de teléfono: </h4>                                    
                                        <p color="black">&nbsp; {{ $user->telefono }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="input-size">Fecha de nacimiento: </h4>                                    
                                        <p color="black">&nbsp; {{ $user->nacimiento }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="input-size">Correo electrónico: </h4>                                    
                                        <p color="black">&nbsp; {{ $user->email }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="input-size">¿Es admin? </h4>                                    
                                        <p color="black" class="text-capitalize">&nbsp; {{ $user->esAdmin }}</p>
                                    </div>
                                </div>

                                
                                <div class="row">

                                    <div class="col-md-3 ">
                                        <a href="{{ route ('users') }}" class="text-decoration-none">Volver</a>
                                    </div> 

                                    <div class="col-md-3 ">
                                        <a href="" class="btn boton-success">Ver Publicaciones</a>
                                    </div> 

                                    <div class="col-md-2 ">
                                        <a href="{{ route('editUser', $user->id) }}" class="btn boton">Editar</a>
                                    </div>

                                    
                                        <form method="POST" action="{{ route('deleteUser', $user->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="col-md-2 ">
                                                <button type="submit" class="btn boton-danger">Eliminar</button>                                              
                                            </div>  
                                        </form>
                                        
                                    

                                </div>                          
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>        
            <pie></pie>

        </div>

        
    </body>
</html>