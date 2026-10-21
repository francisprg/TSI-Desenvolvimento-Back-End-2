<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

class UpdatedAutorResource extends AutorResource
{         

 
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, "Autor atualizado com sucesso!");
    }   

  
    public function with(Request $request) : array
    {
        return [
            'message' => 'Autor atualizado com sucesso!',
        ];
    }
    
}
