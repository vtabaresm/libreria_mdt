@extends('layouts.app')

@section('content')

<h1>Editar Autor</h1>

<form action="{{ route('authors.update', $author->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" value="{{ $author->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nacionalidad</label>
        <input type="text" name="nationality" value="{{ $author->nationality }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="birth_date" value="{{ $author->birth_date }}" class="form-control">
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>

@endsection


