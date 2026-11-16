<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'titulo',
        'autor_id',
        'isbn',
        'editora',
        'ano_publicacao',
        'sinopse',
        'numero_paginas',
        'capa',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function resenhas()
    {

        return $this->hasMany(Resenha::class);

    }
}