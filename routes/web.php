<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ResenhaController;
use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {

    return view('home');

})->name('home');


//Agrupamento de rotas RESENHA

Route::prefix('resenhas')
    ->controller(ResenhaController::class)
    ->name('resenhas.')
    ->group(function () {

            Route::get('/', 'index')->name('index');

            Route::get('/create','create')->name('create');

            Route::post('/','store')->name('store');

            Route::get('/{resenha}', 'show')->name('show');

            Route::get('/{resenha}/edit','edit')->name('edit');

            Route::put('/{resenha}','update')->name('update');

            Route::delete('/{resenha}', 'destroy')->name('destroy');
});


//Agrupamento de rotas LIVRO

Route::prefix('livros')
    ->controller(LivroController::class)
    ->name('livros.')
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');

        Route::post('/', 'store')->name('store');

        Route::get('/{livro}/edit', 'edit')->name('edit');

        Route::put('/{livro}', 'update')->name('update');

        Route::delete('/{livro}', 'destroy')->name('destroy');

        Route::get('/{livro}', 'show')->name('show');
    });

// Agrupamento de rotas AUTOR

Route::prefix('autores')
    ->controller(AutorController::class)
    ->name('autores.')
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');

        Route::post('/', 'store')->name('store');

        Route::get('/{autor}/edit', 'edit')->name('edit');

        Route::put('/{autor}', 'update')->name('update');

        Route::delete('/{autor}', 'destroy')->name('destroy');

        Route::get('/{autor}', 'show')->name('show');
    });