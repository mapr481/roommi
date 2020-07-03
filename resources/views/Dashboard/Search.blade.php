
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
            <div class="container">                 
                <section class="intro-single ml-5">
                    <div class="ml-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="title-single-box">
                                    <h1 class="title-single">Publicaciones</h1>
                                    <span class="color-text-a">Encontradas según el criterio de búsqueda</span>
                                </div>
                            </div>                
                        </div>
                    </div>
                </section>                
                <aside>
                <div class="col-3 order-2 menu-derecho">
                    <div class="sticky-top">
                        <div class="nav flex-column">
                            <div class="card border-card margen">                    
                                <div class="card-body ">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="direccion" class="title-d">Buscar por: </label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <form class="formulario" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10 ">
                                               
                                                <label for="buscar" class="titulo-size">Buscar:</label>
                                                <input type="text" name="buscar" id="buscar" class="form-control form-control-lg texto" value="{{ $buscar }}">
                                              
                                            </div>
                                        </div>                                        
                                               
                                                              
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                
                                                <label for="genero" class="titulo-size">Género:</label>
                                                <select name="gender_id" id="genero" class="form-control texto input-size">
                                                    <option value="">Seleccione género</option>
                                                    @foreach ($genders as $gender)
                                                        <option class="text-capitalize" value="{{ $gender->id }}">{{ $gender->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-10">
                                               
                                                <label for="tipos" class="titulo-size">Tipo de residencia:</label>
                                                <select name="room_type_id" id="tipos" class="form-control texto input-size">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($types as $type)
                                                        <option class="text-capitalize" value="{{ $type->id }}">{{ $type->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
            
                                        
            
                                        <div class="form-group form-check">
                                           
                                                
                                           <div class="checkbox">
                                                @foreach ($services as $service)
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input texto"
                                                        id="{{ $service->nombre }}"
                                                        name="services[]"
                                                        value="{{ $service->id }}"/>
                                                    <label
                                                        for="{{ $service->nombre }}"
                                                        class="form-check-label input-size text-capitalize"> {{ $service->nombre }}
                                                    </label> <br>
                                                @endforeach
                                            </div>
                                        
                                                           
                                            <div class="checkbox ">
                                                @foreach ($characteristics as $characteristic)
                                                    <input
                                                        type="checkbox" class="form-check-input texto checkbox"
                                                        id="{{ $characteristic->nombre }}"
                                                        name="characteristics[]"
                                                        value="{{ $characteristic->id }}"/>
                                                    <label
                                                        for="{{ $characteristic->nombre }}"
                                                        class="form-check-label input-size text-capitalize"> {{ $characteristic->nombre }}
                                                    </label> <br>
                                                @endforeach
                                            </div>                          
                                        
                                           <div class="checkbox">
                                                @foreach ($options as $option)
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input texto"
                                                        id="{{ $option->nombre }}"
                                                        name="options[]"
                                                        value="{{ $option->id }}"/>
                                                    <label
                                                        for="{{ $option->nombre }}"
                                                        class="form-check-label input-size text-capitalize"> {{ $option->nombre }}
                                                    </label> <br>
                                                @endforeach
                                            </div>
                                            
                                        </div>     
                                        <div class="row justify-content-center">
                                            <input type="submit" value="Buscar" class="btn boton titulo-size">
                                        </div>
            
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                
            </aside>
        
                
                                
                <section class="property-grid grid">
                    
                        <div class="col-md-9 row">                     
                            @foreach ($rooms as $room)                 
                                <div class="col-md-6">
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
                                                            <span class="price-a">Ver Detalles</span>
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
                                                            <h4 class="card-info-title">Precio</h4>                                                            
                                                                <span>{{ $room->precio }} $ | {{ $convertidor * $room->precio }} Bs.</span>                                                                                         
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                        
                    </div>
                    {!! $rooms->links() !!}                                                              
                </section>

                <section class="intro-single ml-5">
                    <div class="ml-5">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="title-single-box">
                                    <h1 class="title-single">Usuarios</h1>
                                    <span class="color-text-a">Encontrados según el criterio de búsqueda</span>
                                </div>
                            </div>                
                        </div>
                    </div>
                </section>   
                
                <section class="section-services section-t8">
                    <div class="row">
                        @foreach ($users as $user)                
                            <div class="col-md-4">
                                <div class="card-box-c foo">
                                    <div class="card-header-c d-flex">
                                        <div class="card-box-ico">
                                            <span class="fa fa-gamepad"></span>
                                        </div>
                                        <div class="card-title-c align-self-center">
                                            <h2 class="title-c">{{ $user->nombre }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body-c">
                                        <p class="content-c">
                                            {{ $user->telefono }}
                                        </p> <br>
                                        <p class="content-c">
                                            {{ $user->email }}
                                        </p>   
                                    </div>
                                    <div class="card-footer-c">
                                        <a href="{{ route('ViewUser', $user->id) }}" class="link-c link-icon">Ver usuario
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>                   
                        @endforeach
                    </div>
                </section>
        </div>
        </div>   
        <pie></pie>
    </div>
</body>

</html>


