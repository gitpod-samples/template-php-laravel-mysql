@extends("layouts.app1")



@section("contenido")
<style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10px;
            border: 4px solid greenyellow;
            margin: 5px;
            padding: 5px;
            border-radius: 5px
        }
    </style>   
</head>
<body>
    <h1>PDF Pilotos</h1>

    @if(count($pilotos)>0)
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