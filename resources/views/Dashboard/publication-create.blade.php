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
                                        <option value="{{ $gender->id }}">{{ $gender->genero }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-check">
                                <label for="servicios" class="input-size">Servicios:</label><br>
                                @foreach ($services as $service)
                                    <input
                                        type="checkbox"
                                        class="form-check-input texto"
                                        id="{{ $service->servicio }}"
                                        name="internet"
                                        value="{{ $service->id }}"/>
                                    <label
                                        for="{{ $service->servicio }}"
                                        class="form-check-label input-size"> {{ $service->servicio }}
                                    </label><br>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <input type="radio" id="interno" name="baño" value="interno" class="texto">
                                <label for="interno" class="input-size">Baño interno</label><br>
                                <input type="radio" id="compartido" name="baño" value="compartido" class="texto">
                                <label for="compartido" class="input-size">Baño compartido</label><br>
                            </div>

                            <div class="form-group">
                                <input type="radio" id="individual" name="cuarto" value="individual" class="texto">
                                <label for="individual" class="input-size">Cuarto individual</label><br>
                                <input type="radio" id="duplex" name="cuarto" value="duplex" class="texto">
                                <label for="duplex" class="input-size">Cuarto compartido</label><br>
                            </div>

                            <div class="form-group">
                                <input type="radio" id="estudiante" name="especificacion" value="estudiante" class="texto">
                                <label for="estudiante" class="input-size">Residencia Estudiantil</label><br>
                                <input type="radio" id="profesional" name="especificacion" value="profesional" class="texto">
                                <label for="profesional" class="input-size">Residencia para Profesionales/Trabajadores</label><br>
                                <input type="radio" id="ambos" name="especificacion" value="ambos" class="texto">
                                <label for="ambos" class="input-size">Residencia para Profesionales y Estudiantes</label><br>

                            </div>


                            <div class="form-group col-md-6">
                                <label for="tipos" class="input-size">Tipo de Residencia:</label><br>
                                <select name="type_room_id" id="tipos" class="form-control texto input-size">
                                    <option value="">Seleccione</option>
                                    @foreach ($typerooms as $type)
                                        <option value="{{ $type->id }}">{{ $type->tipo }}</option>
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
