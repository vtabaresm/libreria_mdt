<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DatosController;

//Rutas de autenticación (login, registro, logout, recuperación de contraseña)
Auth::routes();

//Rutas de solo administrador: crear, actualizar y eliminar
//Se definen primero para que /create no sea capturada por /{id}
Route::middleware('auth', 'role:admin')->group(function () {
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::resource('authors', AuthorController::class)->except(['index', 'show']);
    Route::resource('books', BookController::class)->except(['index', 'show']);
});

//Rutas de consulta: accesibles para administradores y lectores
Route::middleware('auth', 'role:admin|reader')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('authors', AuthorController::class)->only(['index', 'show']);
    Route::resource('books', BookController::class)->only(['index', 'show']);

    //Ruta para acceder al index de datos
    Route::get('datos', [DatosController::class, 'index'])->name('datos.index');
});
