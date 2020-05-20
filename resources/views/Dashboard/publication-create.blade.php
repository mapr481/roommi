@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Crear Post') }}</div>
                    <div class="card-body ">

                        <form action="{{ route("publication.store") }}" method="POST">
                            @csrf
                            <div class="form-group row col-md-6">
                                <label for="titulo">Título: </label>                              
                                <input type="text" name="titulo" id="titulo" class="form-control">
                            </div>
                            <div class="form-group row col-md-6">
                                <label for="direccion">Dirección: </label>
                                <input type="text" name="direccion" id="direccion" class="form-control">
                            </div>
                            

                            <div class="form-group col-md-6">
                                <label for="detalles">Detalles de la residencia</label>
                                <textarea name="detalles" id="detalles" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="genero">Género</label>
                                <select name="genero" id="genero" class="form-control">           
                                    <option value="damas">Damas</option>
                                    <option value="caballeros">caballeros</option>
                                    <option value="unisex">Unisex</option>
                                </select>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="internet" name="servicio-1" value="internet">
                                <label for="internet" class="form-check-label"> Internet</label><br>
                                <input type="checkbox" class="form-check-input" id="cable" name="servicio-2" value="cable">
                                <label for="cable" class="form-check-label"> Cable de televisión</label><br>
                                <input type="checkbox" class="form-check-input" id="telefono" name="servicio-3" value="telefono">
                                <label for="telefono" class="form-check-label"> Teléfono</label><br> 
                                <input type="checkbox" class="form-check-input" id="visitas" name="caracteristica-1" value="visitas">
                                <label for="visitas" class="form-check-label"> ¿Permite visitas?</label><br>
                                <input type="checkbox" class="form-check-input" id="vehiculos" name="caracteristica-2" value="vehiculos">
                                <label for="vehiculos" class="form-check-label"> ¿Tiene espacio para vehículos?</label><br>
                                <input type="checkbox" class="form-check-input" id="mascotas" name="caracteristica-3" value="mascotas">
                                <label for="mascotas" class="form-check-label"> ¿Permite mascotas?</label><br>
                                <input type="checkbox" class="form-check-input" id="cocina" name="caracteristica-4" value="cocina">
                                <label for="cocina" class="form-check-label"> ¿Posee cocina?</label><br>         
                            </div>

                            <div class="form-group">
                                <input type="radio" id="interno" name="baño" value="interno">
                                <label for="interno">Baño interno</label><br>
                                <input type="radio" id="compartido" name="baño" value="compartido">
                                <label for="compartido">Baño compartido</label><br>       
                            </div>

                            <div class="form-group">
                                <input type="radio" id="individual" name="cuarto" value="individual">
                                <label for="individual">Cuarto individual</label><br>
                                <input type="radio" id="compañia" name="cuarto" value="compañia">
                                <label for="compañia">Cuarto compartido</label><br>       
                            </div>

                            <div class="form-group">
                                <input type="radio" id="estudiante" name="tipo" value="estudiante">
                                <label for="estudiante">Residencia Estudiantil</label><br>
                                <input type="radio" id="profesional" name="tipo" value="profesional">
                                <label for="profesional">Residencia para Profesionales/Trabajadores</label><br>
                                <input type="radio" id="ambos" name="tipo" value="ambos">
                                <label for="ambos">Residencia para Profesionales y Estudiantes</label><br>  

                            </div>
                            


                            <div class="form-group col-md-6">
                                <label for="tipos">Tipo de Residencia</label>
                                <select name="tipos" id="tipos" class="form-control">           
                                    <option value="anexo">Anexo</option>
                                    <option value="casa">Casa</option>
                                    <option value="apartamento">Apartamento</option>
                                    <option value="dormitorio">Dormitorio</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control">
                            </div>
                            
                            <input type="submit" value="Enviar" class="btn btn-success">


                        </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection