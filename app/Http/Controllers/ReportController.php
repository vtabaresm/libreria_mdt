<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Pantalla con las dos opciones de reporte.
     */
    public function index()
    {
        return view('reports.index');
    }

    /**
     * Descarga un Excel con todos los libros.
     */
    public function booksExcel()
    {
        return Excel::download(new BooksExport, 'libros_' . now()->format('Ymd_His') . '.xlsx');
    }

    /**
     * Descarga un PDF con el resumen de cantidades.
     */
    public function summaryPdf()
    {
        $datos = [
            'categorias' => Category::count(),
            'autores'    => Author::count(),
            'libros'     => Book::count(),
            'fecha'      => now()->format('d/m/Y H:i'),
        ];

        return Pdf::loadView('reports.summary-pdf', $datos)
            ->download('resumen_libreria_' . now()->format('Ymd_His') . '.pdf');
    }
}
