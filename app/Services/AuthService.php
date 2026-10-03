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

        
       // dd($user->password, $data['password'], Hash::make($data['password']));
        
        if ($user && $user->is_active && Hash::check($data['password'], $user->password)) {
            //dd($user);
            if($user->is_admin){
                
                return [
                    'user' => $user, 
                    'token' => $user->createToken(
                        'api_token', 
                        [
                            'users:read',
                            'users:update',
                            'users:delete',                            

                            'incidentes:create',
                            'incidentes:read',
                            'incidentes:update',
                            'incidentes:delete',
                            
                        ]
                    )->plainTextToken,
                    'expiresAt' => now()->addMinutes(config('sanctum.expiration')),
                    ];
            }

            
            return [
                    'user' => $user, 
                    'token' => $user->createToken('api_token', 
                    [
                        
                        'incidentes:create',
                        'incidentes:read',
                        'incidentes:update',
                        'incidentes:delete',

                        'users:read',
                        'users:update',
                    ])->plainTextToken,
                    'expiresAt' => now()->addMinutes(config('sanctum.expiration')),
                    ];
        }

        //dd($user, $data['password'], Hash::check($data['password'], $user->password));
        
        return null; 
    } 
}
