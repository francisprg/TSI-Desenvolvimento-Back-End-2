<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Resources\AutorCollection;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;
use App\Http\Resources\StoredAutorResource;
use App\Http\Resources\UpdatedAutorResource;
use App\Models\Autor;
use Exception;
use Illuminate\Http\Request;

class AutorController extends ApiController
{
 
    public function index()
    {
        return new AutorCollection(Autor::paginate(10));
    }

  
    public function show(Autor $autor)
    {
        return new AutorResource($autor);
    }

    public function store (StoreAutorRequest $request) {

    try { 
        return new StoredAutorResource(Autor::create($request->validated()));

    } catch (Exception $error) {

        return $this->errorHandler('Erro ao criar autor', $error, 500);
    }
    }

    public function update (UpdateAutorRequest $request, Autor $autor) {
        
    try { 
        $autor->update($request->validated());
        return new UpdatedAutorResource($autor);
    } catch(Exception $error) { 

        return $this->errorHandler("Nao foi possivel atualizar o autor", $error, 500);
    }

    }

    public function destroy (Autor $autor) {
        
        try {
            $autor->delete();
            return (new AutorResource($autor))->additional(["message" => "Autor removido"]);
        }
        catch ( Exception $error) {

            return $this->errorHandler("Nao foi possivel deletar o autor", $error, 500);
        }

    }
 
}
