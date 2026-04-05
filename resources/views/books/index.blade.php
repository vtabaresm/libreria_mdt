@extends('layouts.app')

@section('content')

<h1>Libros</h1>

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
    Nuevo Libro
</a>

    @if($books->isEmpty())
        <div class="alert alert-warning">
            No hay libros registrados.
        </div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Categoría</th>
                    <th>Autores</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->publication_year ?? '—' }}</td>
                        <td>{{ $book->category->name ?? 'Sin categoría' }}</td>
                        <td>
                            @if($book->authors->isEmpty())
                                <span class="text-muted">Sin autores</span>
                            @else
                                @foreach($book->authors as $author)
                                    <span class="badge bg-secondary">
                                        {{ $author->name }}
                                    </span>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ Str::limit($book->description, 50) }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection