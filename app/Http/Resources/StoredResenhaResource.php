<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoredResenhaResource extends ResenhaResource
{
   
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, 'Resenha criado');
    }

    public function with(Request $request): array
    {
       return [
        'message' => "Resenha criada com sucesso!!",
       ]; 
    }



}

