@extends('layouts.app')

@section('content')

<h1>Editar Categoría</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST" id="formulario">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="name" id="nombre" value="{{ $category->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="descripcion">Descripción</label>
        <textarea name="description" id="descripcion" class="form-control">{{ $category->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="{{ asset('js/validacion_categorias.js') }}"></script>
@endpush
