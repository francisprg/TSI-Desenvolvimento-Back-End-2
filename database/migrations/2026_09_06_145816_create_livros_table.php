<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('autor', 150);
            $table->string('isbn', 20)->unique()->nullable();
            $table->string('editora', 100)->nullable();
            $table->integer('ano_publicacao')->nullable();
            $table->text('sinopse')->nullable();
            $table->integer('numero_paginas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};