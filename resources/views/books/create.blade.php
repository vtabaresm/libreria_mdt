@extends('layouts.app')

@section('content')

<h1>Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Año publicación</label>
        <input type="number" name="publication_year" min="1900" max="2099" step="1" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <select name="category_id" class="form-control">
            <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Autores</label>
        @foreach($authors as $author)
            <div class="form-check">
                <input type="checkbox" name="authors[]" value="{{ $author->id }}" class="form-check-input">
                <label class="form-check-label">{{ $author->name }}</label>
            </div>
        @endforeach
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

@endsection