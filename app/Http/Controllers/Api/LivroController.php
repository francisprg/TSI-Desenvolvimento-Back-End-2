<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Http\Resources\LivroCollection;
use App\Http\Resources\LivroResource;
use App\Http\Resources\StoredLivroResource;
use App\Http\Resources\UpdatedLivroResource;
use App\Models\Livro;
use Exception;



class LivroController extends ApiController
{
    public function index()
    {
        return new LivroCollection(Livro::paginate(10));
    }

    public function show(Livro $livro)
    {
        return new LivroResource($livro);
    }

    public function store(StoreLivroRequest $request)
    {
        try {
            return new StoredLivroResource(Livro::create($request->validated()));
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao criar livro', $error, 500);
        }
    }

    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        try {
            $livro->update($request->validated());

            return new UpdatedLivroResource($livro);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao atualizar livro', $error, 500);
        }
    }

    public function destroy(Livro $livro)
    {
        try {
            $livro->delete();

            return (new LivroResource($livro))->additional(['message' => 'Livro removido']);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao deletar livro', $error, 500);
        }
    }
}
