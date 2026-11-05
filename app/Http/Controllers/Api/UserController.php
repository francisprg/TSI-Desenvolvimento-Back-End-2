<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;


class UserController extends ApiController
{

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return new UserCollection(User::paginate(20));
    }

    public function store(StoreUserRequest $request): UserResource
    {
        try {
            return (new UserResource(User::create($request->validated())))
                ->additional(['message' => 'Usuario criado com sucesso!']);
        } catch (Exception $error) {
            return $this->errorHandler('Nao foi possivel criar usuario', $error, 500);
        }
    }

    public function show(ShowUserRequest $request, User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user): UserResource
    {
        try {

            $userLogged = $request->user();



            $user->update($request->validated());

            return (new UserResource($user))
                ->additional(['message' => 'Usuario atualizado com sucesso!']);
        } catch (Exception $error) {
            return $this->errorHandler('Nao foi possivel atualizar usuario', $error, 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return response()->json(['message' => 'Usuario removido com sucesso!']);
        } catch (Exception $error) {
            return $this->errorHandler('Nao foi possivel remover usuario', $error, 500);
        }
    }
}
