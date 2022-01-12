@extends("layouts.app1")



@section("contenido")
    
</head>
<body>
    <h1>Vuelos</h1>

    @if(count($piloto->vuelos)>0)
        <a href=" {{url('/')}}" class="btn btn-primary">Inicio</a>
        <a href=" {{url('/pilotos')}}" class="btn btn-primary">Volver</a>
        <table id="tabla_vuelos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">ID</th>
                    <th data-orderable="false">CÓDIGO</th>
                    <th>ORIGEN</th>
                    <th>DESTINO</th>
                    <th data-orderable="false">FECHA</th>
                    <th data-orderable="false">HORA</th>
                    <th data-orderable="false">ID PILOTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($piloto->vuelos as $vuelo)
                    <tr data-id='{{$vuelo->id}}'>
                        <td>{{$vuelo->id}}</td>
                        <td>{{$vuelo->codigo}}</td>
                        <td>{{$vuelo->origen}}</td>
                        <td>{{$vuelo->destino}}</td>
                        <td>{{$vuelo->fecha}}</td>
                        <td>{{$vuelo->hora}}</td>
                        <td>{{$vuelo->piloto_id}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <h1>No hay vuelos</h1>
    @endif


@endsection