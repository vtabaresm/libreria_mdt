@extends('layouts.app')

@section('content')

<h1>Nueva Categoría</h1>

<form action="{{ route('categories.store') }}" method="POST" id="formulario">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" id="nombre">
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="description" class="form-control"
            id="descripcion"
        ></textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
<script src="{{asset('js/validacion_categorias.js')}}"></script>
@endsection
