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
    public function authenticate(array $credentials)
    {

        if (Auth::attempt($credentials))
            return User::where('email', $credentials['email'])->first();
        return null;
    }

    public function user(Request $request)
    {
        return $request->user();
    }   




    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Dados inválidos'
            ], 401);
        }

        $request->session()->regenerate();

        return new UserResource(Auth::user());
    }



    public function Logout(Request $request)
    {

        $user = Auth::guard('web')->user();
        if (!$user)
            return response()->json(['message' => "Nao autenticado"], 401);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Sessao encerrada!']);
    }
}
