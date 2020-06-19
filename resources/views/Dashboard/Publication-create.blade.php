@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-card">
                    <div class="card-header titulo-size">{{ __('Crear post') }}</div>
                    <div class="card-body ">

                        <form class="formulario" action="{{ route("room.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="titulo" class="input-size">Título: </label>
                                    <input type="text" name="titulo" id="titulo" class="form-control texto">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="direccion" class="input-size">Dirección: </label>
                                    <input type="text" name="direccion" id="direccion" class="form-control texto">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="detalles" class="input-size">Detalles de la residencia:</label>
                                    <textarea name="detalles" id="detalles" cols="30" rows="10" class="form-control texto"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="genero" class="input-size">Género:</label>
                                    <select name="gender_id" id="genero" class="form-control texto input-size">
                                        <option value="">Seleccione género</option>
                                        @foreach ($genders as $gender)
                                            <option class="text-capitalize" value="{{ $gender->id }}">{{ $gender->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-check ">
                                <label for="service_id" class="input-size">Servicios:</label><br>
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
                                        </label><br>
                                    @endforeach
                                </div>
                            </div>

                              <div class="form-group form-check">
                                <label for="characteristics_id" class="input-size">Características:</label><br>
                                <div class="checkbox">
                                    @foreach ($characteristics as $characteristic)
                                        <input
                                            type="checkbox" class="form-check-input texto checkbox"
                                            id="{{ $characteristic->nombre }}"
                                            name="characteristics[]"
                                            value="{{ $characteristic->id }}"/>
                                        <label
                                            for="{{ $characteristic->nombre }}"
                                            class="form-check-label input-size text-capitalize"> {{ $characteristic->nombre }}
                                        </label><br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group form-check ">
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
                                        </label><br>
                                    @endforeach
                                </div>


                            <div class="form-group">
                                <div class="col-md-6">
                                <label for="tipos" class="input-size">Tipo de Residencia:</label><br>
                                    <select name="room_type_id" id="tipos" class="form-control texto input-size">
                                        <option value="">Seleccione</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="imagen" class="input-size">Agregar Imágen</label>
                                    <input type="file" name="file" id="imagen" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="precio" class="input-size">Precio</label>
                                    <input type="text" name="precio" id="precio" class="form-control texto">
                                </div>
                            </div>

                            <div class="row justify-content-md-center">
                                <input type="submit" value="Enviar" class="btn boton">
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
