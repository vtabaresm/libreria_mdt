@extends('layouts.app')

@section('content')

<h1>Autores</h1>

{{-- Solo el administrador puede crear, editar y eliminar --}}
@if(Auth::user()->role == 'admin')
<a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">
    Nuevo Autor
</a>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Nacionalidad</th>
        <th>Fecha de nacimiento</th>
        @if(Auth::user()->role == 'admin')
        <th>Acciones</th>
        @endif
    </tr>

    @foreach($authors as $author)
    <tr>
        <td>{{ $author->id }}</td>
        <td>{{ $author->name }}</td>
        <td>{{ $author->nationality }}</td>
        <td>{{ $author->birth_date }}</td>
        @if(Auth::user()->role == 'admin')
        <td>
            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">
                Editar
            </a>

            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>

@endsection


