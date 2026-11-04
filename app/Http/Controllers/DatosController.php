<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DatosController extends Controller
{
    public function index()
    {
        // Consumir la API de datos.gov.co (por defecto devuelve solo 1000 registros, por eso se pide un límite mayor)
        $response = Http::get('https://www.datos.gov.co/resource/577f-9ckm.json', [
            '$limit' => 5000,
        ]);

        // Si la API falla, enviar listas vacías y un mensaje de error
        if ($response->failed()) {
            return view('datos.index', [
                'libros' => collect(),
                'total' => 0,
                'labels' => [],
                'valores' => [],
                'error' => 'No se pudo consultar la API',
            ]);
        }

        $libros = collect($response->json());
        $total = $libros->count();

        // Top 10 de autores con más libros (se excluyen los registros sin autor)
        $topAutores = $libros
            ->pluck('autor')
            ->filter(fn ($autor) => $autor && strtolower($autor) !== 'sin autor')
            ->countBy()
            ->sortDesc()
            ->take(10);

        $labels = $topAutores->keys();
        $valores = $topAutores->values();

        // En la tabla se muestran solo los primeros 100 libros
        $libros = $libros->take(100);

        return view('datos.index', compact('libros', 'total', 'labels', 'valores'));
    }
}
