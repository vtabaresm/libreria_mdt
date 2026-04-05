@extends('layouts.app')

@section('content')

<h1>Editar Libro</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="title" value="{{ $book->title }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Año de publicación</label>
        <input type="number" name="publication_year" value="{{ $book->publication_year }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Categoría</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="description" class="form-control">{{ $book->description }}</textarea>
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>

@endsection