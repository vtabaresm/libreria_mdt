<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DataAPIController;
use App\Http\Controllers\ReportController;

//Rutas de login, registro, logout y recuperación de contraseña (laravel/ui)
Auth::routes();

//Rutas solo para el administrador: crear, editar y eliminar
//(este grupo va primero para que /create no se tome como /{id})
Route::middleware('auth', 'role:admin')->group(function () {
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::get('authors/importForm', [AuthorController::class, 'importForm'])->name('authors.importForm');
    Route::post('authors/import', [AuthorController::class, 'import'])->name('authors.import');
    Route::resource('authors', AuthorController::class)->except(['index', 'show']);
    Route::resource('books', BookController::class)->except(['index', 'show']);
});

//Rutas de consulta: las pueden usar el administrador y el lector
Route::middleware('auth', 'role:admin|reader')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('authors', AuthorController::class)->only(['index', 'show']);
    Route::resource('books', BookController::class)->only(['index', 'show']);

    //Reportes: pantalla de opciones y descargas (Excel y PDF)
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/books-excel', [ReportController::class, 'booksExcel'])->name('reports.books.excel');
    Route::get('reports/summary-pdf', [ReportController::class, 'summaryPdf'])->name('reports.summary.pdf');

    //Ruta para acceder al index de datos (Consumo de API externa)
    Route::get('datos', [DataAPIController::class, 'index'])->name('datos.index');
});


