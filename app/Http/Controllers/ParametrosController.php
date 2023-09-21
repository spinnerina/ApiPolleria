<?php

namespace App\Http\Controllers;

use App\Models\Parametros;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    public function createParametro(Request $request){
        $parametroNuevo = $request->all();

        $nuevoParametro = Parametros::create($parametroNuevo);

        if($nuevoParametro instanceof Parametros){
            return response()->json([
                'message' => "Parametro creado correctamente"
            ], 201);
        }else{
            return response()->json([
                'message' => "Error al crear el parametro"
            ],404);
        }
    }


    public function getParametro(){
        $parametro = Parametros::get();

        if($parametro->isEmpty()){
            return response()->json([
                'message' => "No se encontro ningun parametro en la Base de datos"
            ], 404);
        }else{
            return response()->json([
                'message' => "Parametros cargados",
                'parametros' => $parametro
            ], 200);
        }
    }

    public function updateParametro(Request $request){
        $update =  $request->param_tarjeta;

        $parametroActualizado = Parametros::where('param_id', 1)
                                          ->update(['param_tarjeta'=> $update]);
        if($parametroActualizado > 0){
            return response()->json([
                'message' => "Parametro actualizado correctamente"
            ], 200);
        }else{
            return response()->json([
                'message'=> "Error al actualizar el parametro"
            ],404);
        }
    }

}
