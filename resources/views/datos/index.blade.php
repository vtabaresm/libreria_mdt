@extends('layouts.app')

@section('content')

<h1>Datos Externos</h1>
<p class="text-muted">Fuente: datos.gov.co, {{ $total }} libros registrados.</p>

@isset($error)
    <div class="alert alert-danger">{{ $error }}</div>
@endisset

<h4>Top 10 autores con más libros</h4>
<div id="grafica" class="mb-4" style="height: 450px;"></div>

<h4>Libros (primeros 100)</h4>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Libro</th>
        <th>Autor</th>
    </tr>

    @foreach($libros as $libro)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $libro['libro'] ?? '' }}</td>
        <td>{{ $libro['autor'] ?? 'Sin autor' }}</td>
    </tr>
    @endforeach
</table>

<script src="https://cdn.plot.ly/plotly-2.35.2.min.js"></script>
<script>
    Plotly.newPlot('grafica', [{
        type: 'bar',
        orientation: 'h',
        x: @json($valores),
        y: @json($labels),
        marker: { color: 'rgba(220, 53, 69, 0.7)' },
        hovertemplate: '%{y}: %{x} libros<extra></extra>'
    }], {
        // Invertir el eje Y para que el autor con más libros quede arriba
        yaxis: { autorange: 'reversed', automargin: true },
        xaxis: { title: { text: 'Cantidad de libros' } },
        margin: { t: 20 }
    }, { responsive: true, displaylogo: false });
</script>

@endsection
