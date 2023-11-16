<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    public function __construct() 
    {
        $this->middleware('jwtauth')->except('login');
    }

    public function login(LoginRequest $request)
    {
        $input = $request->validated();
        
        $credentials = [
            'email' => $input['email'],
            'password' => $input['password']
        ];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['erro' => 'Não autorizado'], 401);
        }

        return array(
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        );
    }

    public function checkToken()
    {
        return response()->json(['success' => true], 200);
    }
}
