@extends('layouts.app1')



@section("contenido")
    <script>
    $(document).ready(function() {
            $('#tabla_vuelos').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        } );
    } );
    </script>

    <h1>Vuelos</h1>

    @if(count($vuelos)>0)

        <a href=" {{url('/vuelos/create')}}" class="btn btn-primary">Nuevo vuelo</a>
        <a href=" {{url('/')}}" class="btn btn-primary">Inicio</a>
        <table id="tabla_vuelos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">id</th>
                    <th >CÓDIGO</th>
                    <th data-orderable="false">ORIGEN</th>
                    <th data-orderable="false">DESTINO</th>
                    <th data-orderable="false">FECHA</th>
                    <th data-orderable="false">HORA</th>
                    <th data-orderable="false">ID PILOTO</th>
                    <th data-orderable="false">borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vuelos as $vuelo)
                    <tr>
                        <td>{{$vuelo->id}}</td>
                        <td>{{$vuelo->codigo}}</td>
                        <td>{{$vuelo->origen}}</td>
                        <td>{{$vuelo->destino}}</td>
                        <td>{{$vuelo->fecha}}</td>
                        <td>{{$vuelo->hora}}</td>
                        <td>{{$vuelo->piloto_id}}</td>
                        <td class="text-center"> 
                            <form method="POST" action="{{url('/vuelos')}}/{{$vuelo->id}}">
                                @csrf
                                @method("delete")
                                <input type="image" width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png%22%3E">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href=" {{route('vuelos.restore')}}" class="btn btn-warning">Restaurar</a>
        <a href=" {{route('vuelos.onlyTrashed')}}" class="btn btn-Danger">Borrado definitivo</a>
    @else
        <h1>No hay vuelos</h1>
    @endif
@endsection