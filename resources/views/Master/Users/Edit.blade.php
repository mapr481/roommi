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
        <div class="container justify-center margen">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card border-card">                       
                        <div class="card-body">

                            <section class="intro-single">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-8">
                                            <div class="title-single-box">
                                                <h1 class="title-single">Editar Usuario</h1>                                            
                                            </div>
                                        </div>                
                                    </div>
                                </div>
                            </section>
                                    
                            <form method="POST" action="{{ route("UpdateUser", $user->id) }}">
                                @method('PUT')
                                @csrf
    
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-2 col-form-label text-md-right input-size">{{ __('Nombre') }}</label>
    
                                    <div class="col-md-4">
                                        <input id="nombre" placeholder="Ingrese Nombre" type="text" class="text-field--outlined form-control form-control-lg texto @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre',$user->nombre) }}" required autocomplete="nombre" autofocus>
    
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
    
                                
                                    <label for="apellido" class="col-md-2 col-form-label text-md-right input-size">{{ __('Apellido') }}</label>
    
                                    <div class="col-md-4">
                                        <input id="apellido" placeholder="Ingrese Apellido" type="text" class="form-control form-control-lg texto @error('apellido') is-invalid @enderror " name="apellido" value="{{ old('apellido', $user->apellido) }}" required autocomplete="apellido" autofocus>
    
                                        @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="cedula" class="col-md-2 col-form-label text-md-right input-size">{{ __('Cédula') }}</label>
    
                                    <div class="col-md-4">
                                        <input id="cedula" placeholder="Ej: 12345678" type="text" class="form-control form-control-lgtexto @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula', $user->cedula) }}" required autocomplete="cedula" autofocus>
    
                                        @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
    
                                
                                    <label for="nacimiento" class="col-md-2 col-form-label text-md-right input-size">{{ __('Fecha de Nacimiento') }}</label>
    
                                    <div class="col-md-4">
                                        <input id="nacimiento" type="date" class="disable form-control form-control-lg texto @error('nacimiento') is-invalid @enderror" name="nacimiento" value="{{ old('nacimiento', Carbon\Carbon::parse($user->nacimiento)->format('Y-m-d')) }}" required autocomplete="nacimiento" autofocus>
    
                                        @error('nacimiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                        
                                </div>
    
                                <div class="form-group row">
                                    <label for="telefono"  class="col-md-2 col-form-label text-md-right input-size">{{ __('Teléfono') }}</label>
    
                                    <div class="col-md-4">
                                        <input id="telefono" placeholder="Ej: 04141234567" type="text" class="form-control form-control-lg texto @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono', $user->telefono) }}" required autocomplete="telefono" autofocus>
    
                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
    
                                
                                    <label for="email" class="col-md-2 col-form-label text-md-right input-size">{{ __('Correo Electrónico') }}</label>
    
                                    <div class="col-md-4">
                                        <input id="email" placeholder="example@example.com" type="email" class="form-control form-control-lg texto @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                     
                                </div>
                                <div class="for-group row">                                      
                                    <label for="rol" class="col-md-2 col-form-label text-md-right input-size">Rol:</label> 
                                    <div class="col-md-4">
                                        @error('esAdmin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <select name="esAdmin" id="rol" class="form-control form-control-lg texto input-size">                                            
                                            <option value="">Seleccione modo</option>
                                            <option value="si">Admin</option>
                                            <option value="no">Usuario</option>                                               
                                        </select>
                                    </div>     
                                </div>    
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-5 ">
                                        <button type="submit" class="btn btn-lg boton">
                                            {{ __('Editar') }}
                                        </button>
                                    </div>
                                </div>                                                               
                            </form>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div> 

        <pie></pie>
    </div>
</body>

</html>



