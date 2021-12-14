@extends('layouts.app1')



@section("contenido")

    <script>
    $(document).ready(function() {
            $('#tabla_pilotos').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        } );
    } );
    </script>

    <h1>Pilotos</h1>

    @if(count($pilotos)>0)

        <a href=" {{url('/pilotos/create')}}" class="btn btn-primary">Nuevo piloto</a>
        <a href=" {{url('/')}}" class="btn btn-primary">Inicio</a>
        <table id="tabla_pilotos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">id</th>
                    <th >Nombre</th>
                    <th data-orderable="false">Apellidos</th>
                    <th data-orderable="false">Fecha nacimiento</th>
                    <th data-orderable="false">Email</th>
                    <th data-orderable="false">DNI</th>
                    <th data-orderable="false">Teléfono</th>
                    <th data-orderable="false">borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pilotos as $piloto)
                    <tr>
                        <td>{{$piloto->id}}</td>
                        <td>{{$piloto->nombre}}</td>
                        <td>{{$piloto->apellidos}}</td>
                        <td>{{$piloto->f_nacimiento}}</td>
                        <td>{{$piloto->email}}</td>
                        <td>{{$piloto->dni}}</td>
                        <td>{{$piloto->telefono}}</td>
                        <td class="text-center"> 
                            <form method="POST" action="{{url('/pilotos')}}/{{$piloto->id}}">
                                @csrf
                                @method("delete")
                                <input type="image" width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png%22%3E">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href=" {{route('pilotos.restore')}}" class="btn btn-warning">Restaurar</a>
        <a href=" {{route('pilotos.onlyTrashed')}}" class="btn btn-Danger">Borrado definitivo</a>
    @else
        <h1>No hay pilotos</h1>
    @endif
@endsection