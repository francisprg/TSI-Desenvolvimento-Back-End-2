<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResenhaRequest;
use App\Http\Requests\UpdateResenhaRequest;
use App\Http\Resources\ResenhaCollection;
use App\Http\Resources\ResenhaResource;
use App\Http\Resources\StoredResenhaResource;
use App\Http\Resources\UpdatedResenhaResource;
use App\Models\Resenha;
use Exception;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class ResenhaController extends ApiController
{
    public function index()
    {
        return new ResenhaCollection(Resenha::paginate(10));
    }   


    public function show(Resenha $resenha)
    {
        return new ResenhaResource($resenha);
    }

    
    public function store(StoreResenhaRequest $request)
    {
        try{ 
        return new StoredResenhaResource(Resenha::create($request->validated()));
        }
        catch (Exception $error) {
            return $this->errorHandler("Erro ao criar nova Resenha", $error, 500);
        }
    }
    
    public function update (UpdateResenhaRequest $request, Resenha $resenha) {

        try {  
            $resenha->update($request->validated());
            return new UpdatedResenhaResource($resenha);
        } catch(Exception $error) {

            return $this->errorHandler("Erro ao atualizar resenha", $error, 500);
        }
    
    }

    public function destroy(Resenha $resenha) {

        try {
            $resenha->delete();
            return (new ResenhaResource($resenha))->additional(["message" => "Resenha removida"]);
        } catch (Exception $error) {
            return $this->errorHandler("Erro ao deletar resenha", $error, 500);
        }
        
    }
  

  
}
