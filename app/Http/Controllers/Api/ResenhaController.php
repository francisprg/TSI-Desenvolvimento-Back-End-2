<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResenhaCollection;
use App\Http\Resources\ResenhaResource;
use App\Models\Resenha;
use Illuminate\Http\Request;

class ResenhaController extends Controller
{
    
    public function index()
    {
        return new ResenhaCollection(Resenha::paginate(10));
    }   


    public function show(Resenha $resenha)
    {
        return new ResenhaResource($resenha);
    }

  

  
}
