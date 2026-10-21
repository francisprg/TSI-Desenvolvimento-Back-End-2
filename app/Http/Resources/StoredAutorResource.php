<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

class StoredAutorResource extends AutorResource
{


    public function withResponse(Request $request, JsonResponse $response)
    {
       $response->setStatusCode(201, 'Autor criado');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Autor criado com sucesso!'
        ];
    }   


}
