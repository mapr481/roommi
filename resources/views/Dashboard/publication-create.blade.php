@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-card">
                    <div class="card-header titulo-size">{{ __('Crear Post') }}</div>
                    <div class="card-body ">

                        <form action="{{ route("room.store") }}" method="POST">
                            @csrf
                            <div class="form-group row col-md-6">
                                <label for="titulo" class="input-size">Título: </label>
                                <input type="text" name="titulo" id="titulo" class="form-control texto">
                            </div>
                            <div class="form-group row col-md-6">
                                <label for="direccion" class="input-size">Dirección: </label>
                                <input type="text" name="direccion" id="direccion" class="form-control texto">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="detalles" class="input-size">Detalles de la residencia</label>
                                <textarea name="detalles" id="detalles" cols="30" rows="10" class="form-control texto"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="genero" class="input-size">Género:</label>
                                <select name="gender_id" id="genero" class="form-control texto input-size">
                                    <option value="">Seleccione Género</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-check">
                                <label for="servicios" class="input-size">Servicios:</label><br>
                                @foreach ($services as $service)
                                    <input
                                        type="checkbox"
                                        class="form-check-input texto"
                                        id="{{ $service->nombre }}"
                                        name="services[]"
                                        value="{{ $service->id }}"/>
                                    <label
                                        for="{{ $service->nombre }}"
                                        class="form-check-label input-size"> {{ $service->nombre }}
                                    </label><br>
                                @endforeach
                            </div>

                            <div class="form-group form-check">
                                <label for="servicios" class="input-size">Caracteristicas:</label><br>
                                @foreach ($characteristics as $characteristic)
                                    <input
                                        type="checkbox"
                                        class="form-check-input texto"
                                        id="{{ $service->servicio }}"
                                        name="characteristics[]"
                                        value="{{ $characteristic->id }}"/>
                                    <label
                                        for="{{ $characteristic->nombre }}"
                                        class="form-check-label input-size"> {{ $characteristic->nombre }}
                                    </label><br>
                                @endforeach
                            </div>

                            <div class="form-group form-check">
                                <label for="servicios" class="input-size">Opciones:</label><br>
                                @foreach ($options as $option)
                                    <input
                                        type="checkbox"
                                        class="form-check-input texto"
                                        id="{{ $option->nombre }}"
                                        name="options[]"
                                        value="{{ $option->id }}"/>
                                    <label
                                        for="{{ $option->nombre }}"
                                        class="form-check-label input-size"> {{ $option->nombre }}
                                    </label><br>
                                @endforeach
                            </div>


                            <div class="form-group col-md-6">
                                <label for="tipos" class="input-size">Tipo de Residencia:</label><br>
                                <select name="room_type_id" id="tipos" class="form-control texto input-size">
                                    <option value="">Seleccione</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="precio" class="input-size">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control texto">
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
