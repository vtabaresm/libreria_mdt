<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DataAPIController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);

//Ruta para acceder al index de datos (Consumo de API externa)
Route::get('datos', [DataAPIController::class, 'index'])->name('datos.index');