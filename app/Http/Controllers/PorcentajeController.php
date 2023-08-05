<?php

namespace App\Http\Controllers;

use App\Models\Porcentaje;
use Illuminate\Http\Request;
use App\Http\Requests\PorcentajeRequest;

class PorcentajeController extends Controller
{
    
    public function createPorcentaje(PorcentajeRequest $request){
        $porcentajeNuevo = $request->all();
        $porcentajeCreado = Porcentaje::create($porcentajeNuevo);

        if($porcentajeCreado instanceof Porcentaje){
            return response()->json([
                'message' => "Porcentaje creado correctamente"
            ], 201);
        }else{
            return response()->json([
                'message' => "No se pudo crear el porcentaje",
            ], 404);
        }
    }

    public function getProductosConPorcentaje()
    {
        $porcentajes = Porcentaje::leftjoin('producto', 'porcentaje.prod_id', '=', 'producto.prod_id')
                                 ->select('producto.*', 'porcentaje.*')
                                 ->get();

        if ($porcentajes->isEmpty()) {
            return response()->json([
                'message' => "No se encontraron productos con porcentaje asignado"
            ], 404);
        } else {
            return response()->json([
                'message' => "Productos con porcentaje cargados",
                'productos' => $porcentajes
            ], 200);
        }
    }

}
