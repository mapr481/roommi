<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ Auth::user() }}">
    <title>{{ config('app.name', 'ROOMMI') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"
</head>
<body>
    <div id="app">
        <barra-superior></barra-superior>
        <nav-vertical></nav-vertical>             

   



        <div class="container justify-center margen">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card border-card">
                        <div class="row section-t3 ml-5">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <label for="precio" class="title-d">Iniciar sesión</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="nombre" class="col-md-2 col-form-label text-md-right input-size">{{ __('Nombre') }}</label>

                                    <div class="col-md-4">
                                        <input id="nombre" placeholder="Ingrese Nombre" type="text" class="text-field--outlined form-control texto @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                                
                                    <label for="apellido" class="col-md-2 col-form-label text-md-right input-size">{{ __('Apellido') }}</label>

                                    <div class="col-md-4">
                                        <input id="apellido" placeholder="Ingrese Apellido" type="text" class="form-control texto @error('apellido') is-invalid @enderror " name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

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
                                        <input id="cedula" placeholder="Ej: 12345678" type="text" class="form-control texto @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                        @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                                
                                    <label for="nacimiento" class="col-md-2 col-form-label text-md-right input-size">{{ __('Fecha de nacimiento') }}</label>

                                    <div class="col-md-4">
                                        <input id="nacimiento" type="date" class="form-control texto @error('nacimiento') is-invalid @enderror" name="nacimiento" value="{{ old('nacimiento') }}" required autocomplete="nacimiento" autofocus>

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
                                        <input id="telefono" placeholder="Ej: 04141234567" type="text" class="form-control texto @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                                
                                    <label for="email" class="col-md-2 col-form-label text-md-right input-size">{{ __('Correo electrónico') }}</label>

                                    <div class="col-md-4">
                                        <input id="email" placeholder="example@example.com" type="email" class="form-control texto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label text-md-right input-size">{{ __('Contraseña') }}</label>

                                    <div class="col-md-4">
                                        <input id="password" placeholder="Al menos 8 Carácteres" type="password" class="form-control texto @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right input-size">{{ __('Confirmar contraseña') }}</label>

                                    <div class="col-md-4">
                                        <input id="password-confirm" placeholder="Repite contraseña" type="password" class="form-control texto" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-5 ">
                                        <button type="submit" class="btn btn-lg boton">
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>                                                               
                            </form>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div> 
        <div class="mt-5 mb-5">       
            <div class="mt-5">
                <pie></pie> 
            </div>
        </div>
    </div>

    
</body>
</html>