@extends("layouts.app1")



@section("contenido")

<script>
    $(document).ready(function() {
        $('#tabla_vuelos').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });

        $(".borrar").click(function(){
            const tr=$(this).closest("tr"); //guardamos el tr completo
            const id=tr.data("id");
            Swal.fire({
                title: '¿seguro que quieres borrarlo?',
                showCancelButton: true,
                confirmButtonText: 'Borrar',
                cancelButtonText: `Cancelar`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url   : "{{url('/vuelos')}}/"+id,
                        data  : {
                            _token: "{{csrf_token()}}",
                            _method: "delete",
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    });
                } 
            })
        });

    } );
    </script>
    
</head>
<body>
    <h1>Vuelos</h1>
    <a href=" {{url('/')}}" class="btn btn-primary">Inicio</a><br><br>
    @if(count($vuelos)>0)
        
        <a href=" {{url('/vuelos/create')}}" class="btn btn-primary">Nuevo vuelo</a><br><br>
        <a href=" {{url('/pilotos')}}" class="btn btn-primary">Pilotos</a>
        <a href=" {{url('/pasajes')}}" class="btn btn-primary">Pasajes</a>
        <table id="tabla_vuelos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">ID</th>
                    <th>CÓDIGO</th>
                    <th data-orderable="false">ORIGEN</th>
                    <th data-orderable="false">DESTINO</th>
                    <th data-orderable>FECHA</th>
                    <th data-orderable>HORA</th>
                    <th data-orderable>ID PILOTO</th>
                    <th>EDITAR</th>
                    <th>BORRAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vuelos as $vuelo)
                    <tr data-id='{{$vuelo->id}}'>
                        <td align="center">{{$vuelo->id}}</td>
                        <td align="center">{{$vuelo->codigo}}</td>
                        <td align="center">{{$vuelo->origen}}</td>
                        <td align="center">{{$vuelo->destino}}</td>
                        <td align="center">{{$vuelo->fecha}}</td>
                        <td align="center">{{$vuelo->hora}}</td>
                        <td align="center">{{$vuelo->piloto_id}}</td>

                        <td align="center"><a href="{{url('/vuelos')}}/{{$vuelo->id}}/edit"><img width="32px" src="https://img.icons8.com/cotton/2x/000000/edit.png"></a></td>
                        <td align="center"><a href="#" class='btn btn-danger borrar'>Borrar</a></td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <h1>No hay usuarios</h1>
    @endif


@endsection