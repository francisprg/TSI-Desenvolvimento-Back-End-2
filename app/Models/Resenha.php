<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenha extends Model
{
    use HasFactory;


    protected $fillable = [
        'texto',
        'user_id',
        'livro_id',
        'datapublicacao'
    ];


    public function user () {

       return $this->belongsTo(User::class);
    }

    public function livro () {

       return $this->belongsTo(Livro::class);
    }
}