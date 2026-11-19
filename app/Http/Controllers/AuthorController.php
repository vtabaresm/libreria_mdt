<?php

namespace App\Http\Controllers;

use App\Imports\AuthorsImport;
use App\Models\Author;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        Author::create($request->all());
        return redirect()->route('authors.index');
    }

    public function importForm()
    {
        return view('authors.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:5120',
        ], [
            'file.required' => 'Debe seleccionar un archivo.',
            'file.mimes' => 'El archivo debe ser un Excel (.xlsx o .xls).',
            'file.max' => 'El archivo no puede superar 5 MB.',
        ]);

        $import = new AuthorsImport;

        try {
            Excel::import($import, $request->file('file'));
        } catch (ValidationException $e) {
            $errores = [];
            foreach ($e->failures() as $failure) {
                $errores[] = 'Fila ' . $failure->row() . ' (' . $failure->attribute() . '): '
                    . implode(' ', $failure->errors());
            }
            return back()->withErrors($errores);
        }

        return redirect()->route('authors.index')->with(
            'success',
            "Importación completada: {$import->creados} creados, {$import->actualizados} actualizados."
        );
    }

    public function edit(string $id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return redirect()->route('authors.index');
    }

    public function destroy(string $id)
    {
        Author::destroy($id);
        return redirect()->route('authors.index');
    }
}