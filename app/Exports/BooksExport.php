<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BooksExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
     * Consulta que se exporta: todos los libros con su categoría y autores.
     * (with() evita hacer una consulta por cada fila: problema N+1)
     */
    public function query()
    {
        return Book::query()->with(['category', 'authors'])->orderBy('title');
    }

    /**
     * Fila de encabezados del Excel.
     */
    public function headings(): array
    {
        return ['ID', 'Título', 'Año de publicación', 'Categoría', 'Autores', 'Descripción'];
    }

    /**
     * Convierte cada libro en una fila del Excel.
     */
    public function map($book): array
    {
        return [
            $book->id,
            $book->title,
            $book->publication_year,
            $book->category->name ?? '',
            $book->authors->pluck('name')->implode(', '),
            $book->description,
        ];
    }

    /**
     * Pone la fila de encabezados en negrita.
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
