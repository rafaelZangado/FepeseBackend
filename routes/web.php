<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\ContatoController::class, 'index'])->name('contatos.index');
Route::resource('contatos', App\Http\Controllers\ContatoController::class);