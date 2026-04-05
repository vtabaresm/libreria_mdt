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
        $book = Book::create($request->all());
        //Se agrega el registro en la tabla intermedia
        $book->authors()->attach($request->authors);
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
        $book->update($request->all());
        // Sincroniza los autores del libro (agrega, mantiene o elimina relaciones según lo enviado; 
        // usa [] si no se selecciona ninguno)
        $book->authors()->sync($request->authors ?? []);
        return redirect()->route('books.index');
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
