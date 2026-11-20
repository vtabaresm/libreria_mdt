@extends('layouts.app')

@section('content')

<h1>Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST" id="formulario">
    @csrf

    <div class="mb-3">
        <label for="titulo">Título</label>
        <input type="text" name="title" id="titulo" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="anio">Año publicación</label>
        <input type="number" name="publication_year" id="anio" min="1901" max="2099" step="1" value="{{ old('publication_year') }}" class="form-control @error('publication_year') is-invalid @enderror">
        @error('publication_year')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select name="category_id" id="categoria" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3" id="autores">
        <label class="form-label">Autores</label>
        @foreach($authors as $author)
            <div class="form-check">
                <input type="checkbox" name="authors[]" value="{{ $author->id }}" class="form-check-input"
                    {{ in_array($author->id, old('authors', [])) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $author->name }}</label>
            </div>
        @endforeach
        @error('authors')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        @error('authors.*')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="descripcion">Descripción</label>
        <textarea name="description" id="descripcion" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

@endsection

@push('scripts')
    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="{{ asset('js/validacion_libros.js') }}"></script>
@endpush

