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
        <label>Año de publicación</label>
        <input type="number" name="publication_year" class="form-control">
    </div>

    <div class="mb-3">
        <label>Categoría</label>
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
        <label>Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button class="btn btn-success">Guardar</button>
</form>

@endsection