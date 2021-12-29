@extends("layouts.app1")



@section("contenido")
    
</head>
<body>
    <h1>Pilotos</h1>

    @if(count($pilotos)>0)
        <a href=" {{url('/')}}" class="btn btn-primary">Inicio</a>
        <a href=" {{url('/vuelos')}}" class="btn btn-primary">Volver</a>
        <a href="/imprimirpdf">Imprimir</a>
        <table id="tabla_vuelos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th data-orderable="false">F.NACIMIENTO</th>
                    <th data-orderable="false">EMAIL</th>
                    <th data-orderable="false">DNI</th>
                    <th data-orderable="false">TELEFONO</th>
                    <th data-orderable="false">VUELOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pilotos as $piloto)
                    <tr data-id='{{$piloto->id}}'>
                        <td>{{$piloto->id}}</td>
                        <td>{{$piloto->nombre}}</td>
                        <td>{{$piloto->apellidos}}</td>
                        <td>{{$piloto->f_nacimiento}}</td>
                        <td>{{$piloto->email}}</td>
                        <td>{{$piloto->dni}}</td>
                        <td>{{$piloto->telefono}}</td>
                        <td class="text-center"><a href="{{url('/vuelos_piloto')}}/{{$piloto->id}}">{{$piloto->vuelos->count()}}</a></td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <h1>No hay usuarios</h1>
    @endif


@endsection