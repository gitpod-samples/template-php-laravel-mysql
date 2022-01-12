@extends("layouts.app1")


@section("contenido")

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<h3>Editar vuelo </h3>

<form action="{{url('/vuelos/')}}/{{$vuelo->id}}" method="post">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="codigo">CODIGO</label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo" value="{{$vuelo->id}}">
    </div>
    <div class="form-group">
        <label for="origen">ORIGEN</label>
        <input type="text" class="form-control" id="origen" name="origen" placeholder="origen" value="{{$vuelo->origen}}">
    </div>
    <div class="form-group">
        <label for="destino">DESTINO</label>
        <input type="text" class="form-control" id="destino" name="destino" placeholder="destino" value="{{$vuelo->destino}}">
    </div>
    <div class="form-group">
        <label for="fecha">FECHA</label>
        <input type="text" class="form-control" id="fecha" name="fecha" placeholder="fecha" value="{{$vuelo->fecha}}">
    </div>
    <div class="form-group">
        <label for="hora">HORA</label>
        <input type="text" class="form-control" id="hora" name="hora" placeholder="hora" value="{{$vuelo->hora}}">
    </div>
    <div class="form-group">
        <label for="piloto_id">ID PILOTO</label>
        <input type="text" class="form-control" id="piloto_id" name="piloto_id" placeholder="piloto_id" value="{{$vuelo->piloto_id}}">
    </div>
    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="{{$vuelo->dni}}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{url('/vuelos')}}" class="btn btn-secondary">Volver</a>
</form>

@endsection