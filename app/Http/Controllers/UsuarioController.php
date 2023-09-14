<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsuarioController extends Controller
{
    


    public function login(Request $request){
        $credentials = $request->only('usu_login', 'usu_contrasenia'); //Recibo del body
        try{
            $user = Usuario::where('usu_login', $credentials['usu_login'])->first(); 
        
            if ($user && Hash::check($credentials['usu_contrasenia'], $user->usu_contrasenia)) { //Login correcto

                $token = JWTAuth::fromUser($user); //Creo el token del usuario obtenido 
                $actualizar = DB::table('usuario')
                                ->where('usu_id', '=', $user->usu_id)
                                ->update(['usu_token' => $token]); //Actualizo el token
                if($actualizar > 0){
                    $usuarioDevolver = Usuario::find($user->usu_id);
                    return response()->json(['message' => 'Login Correcto', 'usuario' => $usuarioDevolver],200); //Devuelvo el usuario con el token actualizado
                }
            } else {
                return response()->json(['message' => 'Credenciales invalidas.'], 200);
            }
        }catch(JWTException $e){
            return response()->json(['message' => $e], 500);
        }
    }
}
