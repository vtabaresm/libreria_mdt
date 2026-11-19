@extends('layouts.app')

@section('content')

<h1>Nueva Categoría</h1>

<form action="{{ route('categories.store') }}" method="POST" id="formulario">
    @csrf

    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="name" id="nombre" class="form-control">
    </div>

    <div class="mb-3">
        <label for="descripcion">Descripción</label>
        <textarea name="description" id="descripcion" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="{{ asset('js/validacion_categorias.js') }}"></script>
@endpush
