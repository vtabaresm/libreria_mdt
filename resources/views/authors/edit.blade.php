@extends('layouts.app')

@section('content')

<h1>Editar Autor</h1>

<form action="{{ route('authors.update', $author->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $author->name }}" class="form-control mb-2">
    <input type="text" name="nationality" value="{{ $author->nationality }}" class="form-control mb-2">
    <input type="date" name="birth_date" value="{{ $author->birth_date }}" class="form-control mb-2">

    <button class="btn btn-primary">Actualizar</button>
</form>

@endsection


