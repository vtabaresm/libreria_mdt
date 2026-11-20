<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        //Se obtienen todos los libros incluyendo su categoría
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        //Se obtiene la información de todas las categorías
        $categories = Category::all();
        //Se obtiene la información de todos los autores
        $authors = Author::all();
        //Se retorna la vista con el formulario, enviando la información de categorías y autores
        return view('books.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes());
        $book = Book::create($datos);
        //Se agrega el registro en la tabla intermedia
        $book->authors()->attach($datos['authors']);
        return redirect()->route('books.index');
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        //Se obtiene la información de todas las categorías
        $categories = Category::all();
        //Se obtiene la información de todos los autores
        $authors = Author::all();
        //Se retorna la vista con el formulario, enviando la información de categorías y autores
        return view('books.edit', compact('book', 'categories', 'authors'));
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $datos = $request->validate($this->reglas(), $this->mensajes());
        $book->update($datos);
        // Sincroniza los autores del libro (agrega, mantiene o elimina relaciones según lo enviado).
        // La validación garantiza que haya al menos un autor.
        $book->authors()->sync($datos['authors']);
        return redirect()->route('books.index');
    }

    /**
     * Reglas de validación (las mismas del lado del cliente en validacion_libros.js).
     */
    private function reglas(): array
    {
        return [
            'title'            => ['required', 'string', 'max:255'],
            'publication_year' => ['nullable', 'bail', 'integer', 'between:1901,' . date('Y')],
            'category_id'      => ['required', 'exists:categories,id'],
            'authors'          => ['required', 'array', 'min:1'],
            'authors.*'        => ['exists:authors,id'],
            'description'      => ['nullable', 'string'],
        ];
    }

    private function mensajes(): array
    {
        return [
            'title.required'            => 'El campo título es obligatorio.',
            'title.max'                 => 'El título no puede tener más de 255 caracteres.',
            'publication_year.integer'  => 'El año de publicación debe ser un número entero.',
            'publication_year.between'  => 'El año de publicación debe estar entre 1901 y ' . date('Y') . '.',
            'category_id.required'      => 'Seleccione una categoría.',
            'category_id.exists'        => 'La categoría seleccionada no existe.',
            'authors.required'          => 'Seleccione al menos un autor.',
            'authors.min'               => 'Seleccione al menos un autor.',
            'authors.*.exists'          => 'Uno de los autores seleccionados no existe.',
        ];
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
