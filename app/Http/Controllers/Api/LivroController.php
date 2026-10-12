<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LivroCollection;
use App\Http\Resources\LivroResource;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
  
     
    public function index()
    {
       
        return new LivroCollection(Livro::paginate(10));
        
    }

   
    public function show(Livro $livro)
    {
        return new LivroResource($livro);
    }

  
   
}
