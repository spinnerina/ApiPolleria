<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    public function createStock(StockRequest $request){
        $stockNuevo = $request->all();
        $stockCreado = Stock::create($stockNuevo);

        if($stockCreado instanceof Stock){
            $getStock = Stock::where('stock_id', '=', $stockCreado->id)
                            ->select('stock.*')
                            ->get();
            return response()->json([
                'message'=> "Stock creado correctamente",
                'stock'=> $getStock
            ], 201);
        }else{
            return response()->json([
                'message'=> "Error al crear el stock"
            ], 404);
        }
    }

    public function updateStock(StockRequest $request, $stock_id){
        $update = '';
        $datosActualizar = $request->all();

        //Me aseguro que no se actulice el stock_id
        unset($datosActualizar['stock_id']);

        $update = DB::table('stock')
                    ->where('stock_id', $stock_id)
                    ->update($datosActualizar);
        if($update > 0){
            return response()->json([
                'message'=> "Stock actualizado correctamente"
            ],200);
        }else{
            return response()->json([
                'message'=> "No se encontro el stock o no se pudo actualizar"
            ],404);
        }
    }


    public function incrementStock(StockRequest $request){
        $update = '';
        $datosActualizar = $request->all();

        unset($datosActualizar['stock_id']);

        $update = DB::table('stock')
                    ->where('prod_id', '=', $datosActualizar['prod_id'])
                    ->increment('stock_cantidad', $datosActualizar['stock_cantidad']);
        
        if($update > 0){
            return response()->json([
                'message'=> "Stock incrementado correctamente"
            ],200);
        }else{
            return response()->json([
                'message'=> "No se encontro el producto o no se pudo incrementar"
            ],404);
        }
    }


    public function decrementStock(StockRequest $request){
        $update = '';
        $datosActualizar = $request->all();

        unset($datosActualizar['stock_id']);

        $update = DB::table('stock')
                    ->where('prod_id', '=', $datosActualizar['prod_id'])
                    ->decrement('stock_cantidad', $datosActualizar['stock_cantidad']);
        
        if($update > 0){
            return response()->json([
                'message'=> "Cantidad de stock decrementado correctamente"
            ],200);
        }else{
            return response()->json([
                'message'=> "No se encontro el producto o no se pudo decrementar"
            ],404);
        }
    }
}
