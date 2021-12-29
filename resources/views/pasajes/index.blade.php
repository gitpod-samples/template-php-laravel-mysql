@extends("layouts.app1")



@section("contenido")
    
</head>
<body>
    <h1>Pasajes</h1>

    @if(count($pasajes)>0)
        <a href=" {{url('/')}}" class="btn btn-primary">Inicio</a>
        <a href=" {{url('/vuelos')}}" class="btn btn-primary">Vuelos</a>
        <table id="tabla_vuelos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">ID</th>
                    <th data-orderable="false">NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>ID VUELO</th>
                    <th>PRECIO</th>
                    <th>MÁS</th>
                    <th>MENOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasajes as $pasaje)
                    <tr data-id='{{$pasaje->id}}'>
                        <td>{{$pasaje->id}}</td>
                        <td>{{$pasaje->nombre}}</td>
                        <td>{{$pasaje->apellidos}}</td>
                        <td>{{$pasaje->vuelo_id}}</td>
                        <td>{{$pasaje->precio}}</td>
                        <td><a href=" {{url('/pasaje_mas')}}/{{$pasaje->id}}" class="btn btn-success">+</a></td>
                        <td><a href=" {{url('/pasaje_menos')}}/{{$pasaje->id}}" class="btn btn-danger">-</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <h1>No hay usuarios</h1>
    @endif


@endsection