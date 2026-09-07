<?php

use App\Http\Controllers\ResenhaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/resenhas', [ResenhaController::class, 'index'])->name('resenhas.index');

Route::get('/resenhas/create', [ResenhaController::class, 'create'])->name('resenhas.create');

Route::post('/resenhas', [ResenhaController::class, 'store'])->name('resenhas.store');

Route::get('/resenhas/{resenha}', [ResenhaController::class, 'show'])->name('resenhas.show');

Route::get('/resenhas/{resenha}/edit', [ResenhaController::class, 'edit'])->name('resenhas.edit');

Route::put('/resenhas/{resenha}', [ResenhaController::class, 'update'])->name('resenhas.update');

Route::delete('/resenhas/{resenha}', [ResenhaController::class, 'destroy'])->name('resenhas.destroy');

