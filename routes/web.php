<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

//Se generan todas las rutas asociadas al controlador CategoryController
Route::resource('categories', CategoryController::class);
//Se generan todas las rutas asociadas al controlador AuthorController
Route::resource('authors', AuthorController::class);





Route::get('/', function () {
    return view('welcome');
});
