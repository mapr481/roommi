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
                <div class="mt-5">               
                    <table class="table table-bordered table-hover borde">
                    <thead>
                    <tr>
                        <td>N°</td>
                    <td>
                        Nombre y apellido:    
                    </td>

                    <td>
                        Cédula:    
                    </td> 

                    <td>
                        Teléfono:    
                    </td>

                    <td>
                        Correo electrónico:    
                    </td>

                    <td>
                        Acciones:    
                    </td>

                    </tr>    
                    </thead>    
                    <tbody align="center">
                        @foreach ($users as $user )
                            
                        
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td class="text-capitalize">{{ $user->nombre }} {{ $user->apellido }}</td>
                        <td>{{ $user->cedula }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                           <a href="{{ route('ShowUser', $user->id) }}" class="btn boton-success">Ver</a>
                           <a href="{{ route('EditUser', $user->id) }}" class="btn boton">Editar</a>
                           <form method="POST" action="{{ route('DeleteUser', $user->id) }}">
                                @method('DELETE')
                                @csrf                            
                                <button type="submit" class="btn boton-danger">Eliminar</button>                                            
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table> 
                    {!! $users->links() !!}  

                    
                </div>    
            </div>

            <pie></pie>
        </div>

        
    </body>
</html>