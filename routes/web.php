<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ResenhaController;
use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {

    return view('home');

})->name('home');


//ROTAS DE RESENHAS

Route::get('/resenhas', [ResenhaController::class, 'index'])->name('resenhas.index');

Route::get('/resenhas/create', [ResenhaController::class, 'create'])->name('resenhas.create');

Route::post('/resenhas', [ResenhaController::class, 'store'])->name('resenhas.store');

Route::get('/resenhas/{resenha}', [ResenhaController::class, 'show'])->name('resenhas.show');

Route::get('/resenhas/{resenha}/edit', [ResenhaController::class, 'edit'])->name('resenhas.edit');

Route::put('/resenhas/{resenha}', [ResenhaController::class, 'update'])->name('resenhas.update');

Route::delete('/resenhas/{resenha}', [ResenhaController::class, 'destroy'])->name('resenhas.destroy');


// ROTAS DE LIVROS

Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');

Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create');

Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');

Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');

Route::put('/livros/{livro}', [LivroController::class, 'update'])->name('livros.update');

Route::delete('/livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');

Route::get('/livros/{livro}', [LivroController::class, 'show'])->name('livros.show');


// ROTAS DE AUTORES

Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');

Route::get('/autores/create', [AutorController::class, 'create'])->name('autores.create');

Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');

Route::get('/autores/{autor}/edit', [AutorController::class, 'edit'])->name('autores.edit');

Route::put('/autores/{autor}', [AutorController::class, 'update'])->name('autores.update');

Route::delete('/autores/{autor}', [AutorController::class, 'destroy'])->name('autores.destroy');

Route::get('/autores/{autor}', [AutorController::class, 'show'])->name('autores.show');
