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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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

            <div class="container margen ">
                <div class="row justify-content-center">                    
                    <div class="col-md-10">
                        <table class="table table-list-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Cédula</th>
                                    <th>Número de teléfono</th>
                                    <th>Correo Electrónico</th>
                                    <th>
                                        <div class="">                                            
                                            <div class="input-group">                                                
                                                <input class="form-control" id="system-search" name="q" placeholder="Filtrar" required>                                                    
                                            </div>                                            
                                        </div>
                                    </th>
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
                                        <td class="row">
                                        <a href="{{ route('ShowUser', $user->id) }}" class="btn boton-success ml-4">Ver</a>
                                        <a href="{{ route('EditUser', $user->id) }}" class="btn boton ml-4">Editar</a>&nbsp;
                                        <form method="POST" action="{{ route('DeleteUser', $user->id) }}" class="ml-4">
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
            </div>  
            <pie></pie>
        </div>

        <script>
            $(document).ready(function() {
                var activeSystemClass = $('.list-group-item.active');

                //something is entered in search form
                $('#system-search').keyup( function() {
                var that = this;
                    // affect all table rows on in systems table
                    var tableBody = $('.table-list-search tbody');
                    var tableRowsClass = $('.table-list-search tbody tr');
                    $('.search-sf').remove();
                    tableRowsClass.each( function(i, val) {
                    
                        //Lower text for case insensitive
                        var rowText = $(val).text().toLowerCase();
                        var inputText = $(that).val().toLowerCase();
                        if(inputText != '')
                        {
                            $('.search-query-sf').remove();
                            tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Filtrando búsqueda: "'
                                + $(that).val()
                                + '"</strong></td></tr>');
                        }
                        else
                        {
                            $('.search-query-sf').remove();
                        }

                        if( rowText.indexOf( inputText ) == -1 )
                        {
                            //hide rows
                            tableRowsClass.eq(i).hide();
                            
                        }
                        else
                        {
                            $('.search-sf').remove();
                            tableRowsClass.eq(i).show();
                        }
                    });
                    //all tr elements are hidden
                    if(tableRowsClass.children(':visible').length == 0)
                    {
                        tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No encontrado.</td></tr>');
                    }
                });
            });
        </script>

        
    </body>
</html>