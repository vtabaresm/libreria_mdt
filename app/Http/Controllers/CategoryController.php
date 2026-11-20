<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtiene todas las categorías
        $categories = Category::all();
        //Retorna la vista donde se mostrarán las categorías
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Retorna la vista del formulario para crear una categoría
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Se crea el nuevo registro de la categoría.
        //Con $request se obtienen los datos del formulario.
        $datos = $request->validate($this->reglas(), $this->mensajes());
        Category::create($datos);
        //Se retorna la vista index de categorias
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //No se implementa ya que no se requiere mostrar solo una categoría
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Se obtienen los datos de una categoría específica según su id
        $category = Category::findOrFail($id);
        //Se retorna la vista con el formulario para edición
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Busca una categoría por su id. Si no existe, lanza un error
        $category = Category::findOrFail($id);
        //Se obtiene del formulario de edición los nuevos datos
        $datos = $request->validate($this->reglas(), $this->mensajes());
        $category->update($datos);
        //Se retorna la vista index
        return redirect()->route('categories.index');
    }

    /**
     * Reglas de validación (las mismas del lado del cliente en validacion_categorias.js).
     */
    private function reglas(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ];
    }

    private function mensajes(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio (Servidor).',
            'name.max'      => 'El nombre no puede tener más de 255 caracteres.',
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Elimina una categoría por su id
        Category::destroy($id);
        //Se retorna la vista index
        return redirect()->route('categories.index');
    }
}

