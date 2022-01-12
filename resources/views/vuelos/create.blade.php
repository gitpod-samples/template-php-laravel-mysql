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

<h3>Insertar vuelo </h3>

<form action="{{route('vuelos.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="codigo">CODIGO</label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo" value="{{old('codigo')}}">
    </div>
    <div class="form-group">
        <label for="origen">ORIGEN</label>
        <input type="text" class="form-control" id="origen" name="origen" placeholder="origen" value="{{old('origen')}}">
    </div>
    <div class="form-group">
        <label for="destino">DESTINO</label>
        <input type="text" class="form-control" id="destino" name="destino" placeholder="destino" value="{{old('destino')}}">
    </div>
    <div class="form-group">
        <label for="fecha">FECHA</label>
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" value="{{old('fecha')}}">
    </div>
    <div class="form-group">
        <label for="hora">HORA</label>
        <input type="text" class="form-control" id="hora" name="hora" placeholder="hora" value="{{old('hora')}}">
    </div>
    <div class="form-group">
        <label for="piloto_id">PILOTO</label>
        <select name="piloto_id">
            @foreach($pilotos as $piloto )
              <option value="{{$piloto->id}}">{{$piloto->nombre}} {{$piloto->apellido}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{url('/vuelos')}}" class="btn btn-secondary">Volver</a>
</form>

@endsection