<?php

use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\ResenhaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('livros', LivroController::class)
    ->only('index', 'show', 'store', 'destroy', 'update')
    ->names([
        'index'   => 'api.livros.index',
        'show'    => 'api.livros.show',
        'store'   => 'api.livros.store',
        'destroy' => 'api.livros.delete',
        'update'  => 'api.livros.put',
    ]);

Route::apiResource('autores', AutorController::class)
    ->parameters(['autores' => 'autor'])
    ->only('index', 'show', 'store', 'destroy', 'update')
    ->names([
        'index'   => 'api.autores.index',
        'show'    => 'api.autores.show',
        'store'   => 'api.autores.store',
        'destroy' => 'api.autores.delete',
        'update'  => 'api.autores.put',
    ]);

Route::apiResource('resenhas', ResenhaController::class)
->only('index', 'show', 'store','destroy',  'update')
->names([
        'index' => 'api.resenhas.index',
        'show' => 'api.resenhas.show',
        'store' => 'api.resenhas.store',
        'destroy' => 'api.resenhas.delete',
        'update' => 'api.resenhas.put',
    ]);