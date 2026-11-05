<?php

use App\Http\Controllers\Api\Auth\LoginTokensController;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ResenhaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('users', UserController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy'])
    ->middleware('auth:sanctum')
    ->names([
        'index'   => 'api.users.index',
        'show'    => 'api.users.show',
        'store'   => 'api.users.store',
        'update'  => 'api.users.put',
        'destroy' => 'api.users.delete',
    ]);


    

Route::prefix('token')->controller(LoginTokensController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
    Route::post('revoke', 'revokeAllTokens')->middleware('auth:sanctum');
});




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