<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        //Se obtienen todos los libros, 
        //incluyendo la categoría con la que esté relacionado
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        //Se obtiene la información de todas las categorías
        $categories = Category::all();
        //Se retorna la vista con el formulario, enviando la información de categorías
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    public function edit(string $id)
    {
        //
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        //
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index');
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
