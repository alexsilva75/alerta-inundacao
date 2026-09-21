<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService{
    
    public function register(array $userData){
        $plainPassword = $userData['password'];
        $hashedPassword = Hash::make($plainPassword);

        $userData['password'] = $hashedPassword;

        return User::create($userData);
    }   

    public function login(array $data): ?array{
        $user = User::where('email', $data['email'])->first();
        
        if ($user && Hash::check($data['password'], $user->password)) {
            return [
                    'user' => $user, 
                    'token' => $user->createToken('api_token')->plainTextToken,
                    'expiresAt' => now()->addMinutes(config('sanctum.expiration')),
                    ];
        }
        return null; 
    } 
}
