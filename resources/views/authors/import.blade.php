@extends('layouts.app')

@section('content')

<h1>Importar autores desde Excel</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="alert alert-info">
    El archivo debe ser <strong>.xlsx</strong> y tener en la primera fila los encabezados
    <code>name</code>, <code>nationality</code> y <code>birth_date</code> (aaaa-mm-dd).
    Si ya existe un autor con el mismo nombre, se actualizan sus datos.
</div>

<form action="{{ route('authors.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="file" class="form-label">Archivo Excel</label>
        <input type="file" name="file" id="file" class="form-control" accept=".xlsx,.xls" required>
    </div>
    <button class="btn btn-primary">Importar</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
