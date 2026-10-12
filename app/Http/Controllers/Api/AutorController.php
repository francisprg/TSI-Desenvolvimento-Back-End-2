<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AutorCollection;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
 
    public function index()
    {
        return new AutorCollection(Autor::paginate(10));
    }

  
    public function show(Autor $autor)
    {
        return new AutorResource($autor);
    }

 
}
