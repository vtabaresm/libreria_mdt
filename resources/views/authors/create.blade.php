@extends('layouts.app')

@section('content')

<h1>Nuevo Autor</h1>

<form action="{{ route('authors.store') }}" method="POST" id="formulario">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" id="nombre">
    </div>

    <div class="mb-3">
        <label>Nacionalidad</label>
        <input type="text" name="nationality" class="form-control" id="nacionalidad">
    </div>

    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="birth_date" class="form-control" id="fecha_nacimiento">
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
<script src="{{asset('js/validacion_autores.js')}}"></script>

@endsection


