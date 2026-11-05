<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginTokensController extends LoginController
{

    public function login(LoginRequest $request): UserResource
    {
        try {
            $credentials = $request->validated();
            $user = $this->authenticate($credentials);
            $ability[ ] = $user->is_admin ? 'is_admin' : [];
            $token = $user->createToken($user->email, config("abilities.$ability"))->plainTextToken;
            return new UserResource($user)
                ->additional(
                    [
                        'message' => "Usuario logado via token",
                        'token' => $token
                    ]
                );
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao realizar login!', $error, 500);
        }
    }


    public function logout(Request $request)
    {

        try {
            $user = $request->user();
            $user->currentAccessToken()->delete();

            return response()->json(['message' => 'Logout realizado com sucesso']);
        } catch (Exception $error) {

            return $this->errorHandler('Erro ao realizar logout', $error, 500);
        }
    }

    public function revokeAllTokens(Request $request)
    {

        try {
            $user = $request->user();
            $user->tokens()->delete();
            return response()->json(['message' => 'Todos os tokens do usuario foram revogados']);
        } catch (Exception $error) {
            return $this->errorHandler("Nao foi possivel revogar os tokens", $error, 201);
        }
    }
}
