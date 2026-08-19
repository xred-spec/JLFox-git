<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    public function sudoLogin(Request $request) {
        $request->validate([
            'username' => 'required|string|between:5,20',
            'password' => 'required|string|min:8'
        ]);

        $usuario = Usuario::where('username', $request->username)
            ->first();

        if(!$usuario || $request->password != $usuario->password) {
            return response([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = $usuario->createToken('access_token')->plainTextToken;

        return $this->successResponse([
            'user' => $usuario,
            'token' => $token,
        ], 'Logeado correctamente', 200);
    }
    */
    
    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string|between:5,20',
            'password' => 'required|string|min:8'
        ]);

        $usuario = Usuario::where('username', $request->username)
            ->first();

        if(!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = $usuario->createToken('access_token')->plainTextToken;

        return $this->successResponse([
            'user' => $usuario,
            'token' => $token,
        ], 'Logeado correctamente', 200);
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|between:5,20', 
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $usuario = Usuario::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $usuario->createToken('access_token')->plainTextToken;

        return $this->successResponse([
            'user' => $usuario,
            'token' => $token,
        ], 'Usuario registrado correctamente', 201);
    }
}
