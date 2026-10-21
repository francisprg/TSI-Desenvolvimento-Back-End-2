<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

class UpdatedResenhaResource extends ResenhaResource
{
  
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, "Resenha atualizada com sucesso!!");
    }   


    public function with(Request $request)
    {
         return [
        'message' => "Resenha atualizada com sucesso",
       ]; 
    }

}
