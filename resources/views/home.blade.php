@extends('layouts.app')

@section('content')

<div class="container mt-5 text-center">
    
    <h1 class="mb-4">Sistema de Gestión de la Librería MDT</h1>
    <p class="lead mb-5">
        Bienvenido. Seleccione el módulo al que desea acceder.
    </p>

    <div class="row justify-content-center">

        {{-- Categorías --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title">Categorías</h4>
                    <p class="card-text">
                        Administra las categorías de los libros.
                    </p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">
                        Ir a Categorías
                    </a>
                </div>
            </div>
        </div>

        {{-- Autores --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title">Autores</h4>
                    <p class="card-text">
                        Gestiona los autores registrados.
                    </p>
                    <a href="{{ route('authors.index') }}" class="btn btn-success">
                        Ir a Autores
                    </a>
                </div>
            </div>
        </div>

        {{-- Libros --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title">Libros</h4>
                    <p class="card-text">
                        Administra el catálogo de libros.
                    </p>
                    <a href="{{ route('books.index') }}" class="btn btn-warning">
                        Ir a Libros
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection