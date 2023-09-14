<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialStock;
use App\Http\Requests\HistorialStockRequest;

class HistorialStockController extends Controller
{
    public function createHistorial(HistorialStockRequest $request){
        $historialNuevo = $request->all();

        $historialCreado = HistorialStock::create($historialNuevo);

        if($historialCreado instanceof HistorialStock){
            return response()->json([
                'message'=> "Historial stock creado correctamente",
            ], 201);
        }else{
            return response()->json([
                'message'=> "Error al crear el historial del stock"
            ], 404);
        }
    }
}
