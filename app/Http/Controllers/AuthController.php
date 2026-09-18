<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\AuthService;

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

    
}
