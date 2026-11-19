<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de la Librería MDT</title>
    {{-- Dompdf solo soporta CSS básico: por eso se usan estilos simples y tablas --}}
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; color: #222; }
        h1 { text-align: center; margin-bottom: 4px; }
        .fecha { text-align: center; color: #666; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 10px; }
        th { background: #343a40; color: #fff; text-align: left; }
        td.numero { text-align: right; font-weight: bold; width: 25%; }
    </style>
</head>
<body>
    <h1>Resumen de la Librería MDT</h1>
    <p class="fecha">Generado el {{ $fecha }}</p>

    <table>
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Categorías</td><td class="numero">{{ $categorias }}</td></tr>
            <tr><td>Autores</td><td class="numero">{{ $autores }}</td></tr>
            <tr><td>Libros</td><td class="numero">{{ $libros }}</td></tr>
        </tbody>
    </table>
</body>
</html>
