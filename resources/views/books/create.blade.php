@extends('layouts.app')

@section('content')

<h1>Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST" id="formulario">
    @csrf

    <div class="mb-3">
        <label for="titulo">Título</label>
        <input type="text" name="title" id="titulo" class="form-control">
    </div>

    <div class="mb-3">
        <label for="anio">Año publicación</label>
        <input type="number" name="publication_year" id="anio" min="1901" max="2099" step="1" class="form-control">
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select name="category_id" id="categoria" class="form-control">
            <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
        </select>
    </div>

    <div class="mb-3" id="autores">
        <label class="form-label">Autores</label>
        @foreach($authors as $author)
            <div class="form-check">
                <input type="checkbox" name="authors[]" value="{{ $author->id }}" class="form-check-input">
                <label class="form-check-label">{{ $author->name }}</label>
            </div>
        @endforeach
    </div>

    <div class="mb-3">
        <label for="descripcion">Descripción</label>
        <textarea name="description" id="descripcion" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

@endsection

@push('scripts')
    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="{{ asset('js/validacion_libros.js') }}"></script>
@endpush