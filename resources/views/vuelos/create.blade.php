@extends("layouts.app1")


@section("contenido")

<h3>Insertar vuelo </h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{route('vuelos.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="codigo">CÓDIGO</label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" value="{{old('codigo')}}">
    </div>
    <div class="form-group">
        <label for="origen">ORIGEN</label>
        <input type="text" class="form-control" id="origen" name="origen" placeholder="Origen" value="{{old('origen')}}">
    </div>
    <div class="form-group">
        <label for="destino">DESTINO</label>
        <input type="text" class="form-control" id="destino" name="destino" placeholder="Destino" value="{{old('destino')}}">
    </div>

    <div class="form-group">
        <label for="fecha">FECHA</label>
        <input type="text" class="form-control" id="fecha" name="fecha" placeholder="YYYY-MM-DD" value="{{old('fecha')}}">
    </div>

    <div class="form-group">
        <label for="hora">HORA</label>
        <input type="text" class="form-control" id="hora" name="hora" placeholder="HORA" value="{{old('hora')}}">
    </div>

    <div class="form-group">
        <label for="piloto_id">ID del PILOTO</label>
        <input type="text" class="form-control" id="piloto_id" name="piloto_id" placeholder="ID_PILOTO" value="{{old('piloto_id')}}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{url('/vuelos')}}" class="btn btn-secondary">Volver</a>
</form>

@endsection