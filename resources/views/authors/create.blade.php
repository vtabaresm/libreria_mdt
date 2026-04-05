@extends('layouts.app')

@section('content')

<h1>Nuevo Autor</h1>

<form action="{{ route('authors.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nacionalidad</label>
        <input type="text" name="nationality" class="form-control">
    </div>

    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="birth_date" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
</form>

@endsection


