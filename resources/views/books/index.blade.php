@extends('layouts.app')

@section('content')

<h1>Libros</h1>

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
    Nuevo Libro
</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Año</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>

    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->publication_year }}</td>
        <td>{{ $book->category->name ?? 'Sin categoría' }}</td>
        <td>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                Editar
            </a>

            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection