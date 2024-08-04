<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
   public function create(Request $request){

      $tProductoNuevo = $request->all();
      $tProducto = TipoProducto::create($tProductoNuevo);

      if($tProducto instanceof TipoProducto){
         return response()->json([
               'message'=> "Tipo de producto creado correctamente",
               'tipo_producto'=> $tProducto
         ], 201);
      }else{
         return response()->json([
               'message'=> "Error al crear el tipo de producto"
         ], 404);
      }
   }

   public function getTipoProducto(){
      $tProducto = TipoProducto::all();

      if($tProducto->isNotEmpty()){
          return response()->json(['message' => 'Tipo de producto obtenidos', 'tipo_producto' => $tProducto], 200);
      }else{
          return response()->json(['message' => 'No se encontraron tipos de productos guardados'],404);
      }
   }
}
