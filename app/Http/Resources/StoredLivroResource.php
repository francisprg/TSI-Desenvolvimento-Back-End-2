<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoredLivroResource extends LivroResource
{
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, 'Livro criado');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Livro criado com sucesso!!',
        ];
    }
}
