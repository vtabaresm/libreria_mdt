<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DatosController;

//Rutas de login, registro, logout y recuperación de contraseña
Auth::routes();

//Solo el administrador puede crear, editar y eliminar
//(este grupo va primero para que /create no se tome como /{id})
Route::middleware('auth', 'role:admin')->group(function () {
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::resource('authors', AuthorController::class)->except(['index', 'show']);
    Route::resource('books', BookController::class)->except(['index', 'show']);
});

//El administrador y el lector pueden consultar
Route::middleware('auth', 'role:admin|reader')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('authors', AuthorController::class)->only(['index', 'show']);
    Route::resource('books', BookController::class)->only(['index', 'show']);
});
