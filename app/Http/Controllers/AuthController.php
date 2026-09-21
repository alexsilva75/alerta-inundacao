<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    //

    public function __construct(private AuthService $authService){

    }

    public function register(UserRegistrationRequest $request)
    {
        $user = $this->authService->register($request->validated());
        return response()->json([
                    'message' => 'Usuário registrado com sucesso!', 
                    'data' => $user], 201);
    }

    public function login(LoginRequest $request)
    {
        // Implementar a lógica de autenticação
        $userData = $this->authService->login($request->validated());

        if($userData){
            return response()->json($userData,201);
        }
            
        return response()->json(['message' => 'Falha na autenticação'], 401);
        
    }

    
}
