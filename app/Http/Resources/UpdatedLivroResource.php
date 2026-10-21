<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdatedLivroResource extends LivroResource
{
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, 'Livro atualizado com sucesso!!');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Livro atualizado com sucesso',
        ];
    }
}
