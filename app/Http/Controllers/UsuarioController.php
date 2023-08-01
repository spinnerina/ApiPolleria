<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    
    public function login(Request $request){
        $credentials = $request->only('usu_login', 'usu_contrasenia');
        $user = Usuario::where('usu_login', $credentials['usu_login'])->first();
        
        if ($user && Hash::check($credentials['usu_contrasenia'], $user->usu_contrasenia)) {
            return response()->json(['message' => 'Login Correcto', 'usuario' => $user],200);
        } else {
            return response()->json(['message' => 'Credenciales invalidas.'], 200);
        }
    }
}
