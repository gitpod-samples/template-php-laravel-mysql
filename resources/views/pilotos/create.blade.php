@extends("layouts.app1")


@section("contenido")

<h3>Insertar piloto </h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{route('pilotos.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="nombre">NOMBRE</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
    </div>
    <div class="form-group">
        <label for="apellidos">APELLIDOS</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{old('apellidos')}}">
    </div>
    <div class="form-group">
        <label for="f_nacimiento">F_NACIMIENTO</label>
        <input type="text" class="form-control" id="f_nacimiento" name="f_nacimiento" placeholder="Fecha de Nacimiento" value="{{old('f_nacimiento')}}">
    </div>

    <div class="form-group">
        <label for="f_nacimiento">EMAIL</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
    </div>

    <div class="form-group">
        <label for="f_nacimiento">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" value="{{old('dni')}}">
    </div>

    <div class="form-group">
        <label for="f_nacimiento">TELÉFONO</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{old('telefono')}}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{url('/pilotos')}}" class="btn btn-secondary">Volver</a>
</form>

@endsection