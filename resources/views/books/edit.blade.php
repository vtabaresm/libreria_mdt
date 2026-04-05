@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Editar Libro</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Año de publicación</label>
            <input type="number" name="publication_year" class="form-control" value="{{ $book->publication_year }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select name="category_id" class="form-select">
                <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Autores</label>

            @foreach($authors as $author)
                <div class="form-check">
                    <input 
                        type="checkbox" 
                        name="authors[]" 
                        value="{{ $author->id }}" 
                        class="form-check-input"
                        {{ $book->authors->contains($author->id) ? 'checked' : '' }}
                    >
                    <label class="form-check-label">
                        {{ $author->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control">{{ $book->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

@endsection