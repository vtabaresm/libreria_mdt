@extends('layouts.app')

@section('content')

<h1 class="mb-4">Categorías</h1>

{{-- Solo el administrador puede crear, editar y eliminar --}}
@if(Auth::user()->role == 'admin')
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
    Nueva Categoría
</a>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            @if(Auth::user()->role == 'admin')
            <th>Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            @if(Auth::user()->role == 'admin')
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Eliminar
                    </button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

@endsection