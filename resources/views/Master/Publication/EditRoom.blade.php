@extends('layouts.app')

@section('content')


    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-card">                    
                    <div class="card-body ">
                        <section class="intro-single">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="title-single-box">
                                            <h1 class="title-single">Editar Publicación</h1>                                            
                                        </div>
                                    </div>                
                                </div>
                            </div>
                        </section>
                       
                        <form class="formulario" action="{{ route("UpdatePublication", $room->slug) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group ">
                                <div class="col-md-8">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="titulo" class="title-d">Título </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('titulo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="text" name="titulo" id="titulo" class="form-control form-control-lg texto" value="{{ old('titulo', $room->titulo) }}">
                                  
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="direccion" class="title-d">Dirección </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('direccion')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="text" name="direccion" id="direccion" class="form-control form-control-lg texto" value="{{ old('direccion', $room->direccion) }}">
                                </div>
                            </div>                      
                                                     
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="detalles" class="title-d">Detalles de la residencia </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('detalles')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                    <textarea name="detalles" id="detalles" cols="30" rows="10" class="form-control form-control-lg texto">{{ old('detalles', $room->detalles) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="genero" class="title-d">Género </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gender_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <select name="gender_id" id="genero" class="form-control texto input-size">
                                        <option value="">Seleccione género</option>
                                        @foreach ($genders as $gender)
                                            <option class="text-capitalize" value="{{ $gender->id }}">{{ $gender->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="tipos" class="title-d">Tipo de residencia</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('room_type_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <select name="room_type_id" id="tipos" class="form-control texto input-size">
                                        <option value="">Seleccione</option>
                                        @foreach ($types as $type)
                                            <option class="text-capitalize" value="{{ $type->id }}">{{ $type->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Servicios y Características</h3>
                                    </div>
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


                           

                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="imagen" class="title-d">Agregar Imágen</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('imagen')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="file" name="file" id="imagen" class="form-control-file">
                                </div> 
                            </div>  

                            <div class="form-group">
                                <div class="col-md-8">
                                     <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <label for="precio" class="title-d">Precio </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('precio')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="number" name="precio" id="precio" placeholder="Valor en dólares" class="form-control texto" value="{{ old('precio', $room->precio) }}"  min="0"  oninput="validity.valid||(value='');">
                                    
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input type="submit" value="Enviar" class="btn boton titulo-size">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5">

        </div>
    </div>
          
@endsection