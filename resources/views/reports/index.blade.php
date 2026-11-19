@extends('layouts.app')

@section('content')

<div class="container mt-5 text-center">

    <h1 class="mb-4">Generar reportes</h1>
    <p class="lead mb-5">Seleccione el reporte que desea descargar.</p>

    <div class="row justify-content-center">

        {{-- Reporte en Excel --}}
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title">Libros en Excel</h4>
                    <p class="card-text">
                        Descarga un archivo .xlsx con todos los libros, su categoría y sus autores.
                    </p>
                    <a href="{{ route('reports.books.excel') }}" class="btn btn-success">
                        Descargar Excel
                    </a>
                </div>
            </div>
        </div>

        {{-- Reporte en PDF --}}
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title">Resumen en PDF</h4>
                    <p class="card-text">
                        Descarga un PDF con la cantidad de categorías, autores y libros.
                    </p>
                    <a href="{{ route('reports.summary.pdf') }}" class="btn btn-danger">
                        Descargar PDF
                    </a>
                </div>
            </div>
        </div>

    </div>

    <a href="{{ route('home') }}" class="btn btn-secondary">Volver al inicio</a>

</div>

@endsection
