@extends('layouts.app')

@section('content')

<h1>Editar Autor</h1>

<form action="{{ route('authors.update', $author->id) }}" method="POST" id="formulario">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="name" id="nombre" value="{{ old('name', $author->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="nacionalidad">Nacionalidad</label>
        <input type="text" name="nationality" id="nacionalidad" value="{{ old('nationality', $author->nationality) }}" class="form-control @error('nationality') is-invalid @enderror">
        @error('nationality')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" name="birth_date" id="fecha_nacimiento" value="{{ old('birth_date', $author->birth_date) }}" class="form-control @error('birth_date') is-invalid @enderror">
        @error('birth_date')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="{{ asset('js/validacion_autores.js') }}"></script>
@endpush
