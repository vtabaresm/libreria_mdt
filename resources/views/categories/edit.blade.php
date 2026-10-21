@extends('layouts.app')

@section('content')

<h1>Editar Categoría</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST" id="formulario">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="nombre">
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="description" class="form-control"
            id="descripcion"
        >{{ $category->description }}</textarea>
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>
<script src="{{asset('js/validacion_categorias.js')}}"></script>

@endsection

