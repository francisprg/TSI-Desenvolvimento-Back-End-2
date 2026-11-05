<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiController
{
    public function authenticate(array $credentials ) {
        
        if(Auth::attempt($credentials))
                return User::where('email', $credentials['email'])->first();
        return null;
    }
    
    public function Login(LoginRequest $request ): UserResource{ 

        try{
        $credentials = $request->validated();
        $user = $this->authenticate($credentials);
            if(!$user)
                throw new Exception("Dados invalidos");
            return new UserResource($user)
                ->additional(["message" =>'Usuario logado via cookies']);
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao realizar login', $error, 500);
        }
    }

    public function Logout (Request $request) {

        $user = Auth::guard('web')->user();
        if(!$user)
            return response()->json(['message' => "Nao autenticado"], 401);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Sessao encerrada!']);
    }
}
