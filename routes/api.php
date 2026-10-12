<?php

use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\ResenhaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('livros', LivroController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'api.livros.index',
        'show' => 'api.livros.show',
    ]);

Route::apiResource('autores', AutorController::class)
->parameters(['autores' => 'autor'])
->only('index', 'show')
->names([
        'index' => 'api.autores.index',
        'show' => 'api.autores.show',
    ]);

Route::apiResource('resenhas', ResenhaController::class)
->only('index', 'show')
->names([
        'index' => 'api.resenhas.index',
        'show' => 'api.resenhas.show',
    ]);