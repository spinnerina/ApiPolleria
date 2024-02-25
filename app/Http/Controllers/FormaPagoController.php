<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormaPagoRequest;

class FormaPagoController extends Controller
{
   public function getFormaPago(){
        $formaPago = FormaPago::get();

        if($formaPago->isEmpty()){
            return response()->json([
                'message'=> "No se encontraron formas de pago en la base de datos"
            ], 404);
        }else{
            return response()->json([
                'message'=> "Formas de pago cargadas correctamente",
                'formaPago'=> $formaPago
            ], 200);
        }
   }


   public function createFormaPago(FormaPagoRequest $request){
        $nuevaFormaPago = $request->all();
        $formaPago = FormaPago::create($nuevaFormaPago);

        if($formaPago instanceof FormaPago){
            return response()->json([
                'message'=> "Forma de pago creada correctamente"
            ],201);
        }else{
            return response()->json([
                'message'=> "Error al crear la forma de pago"
            ],404);
        }
   }

   public function updateFormaPago(FormaPagoRequest $request, $form_pago_id){
        $formaPago = $request->all();

        //Me aseguro que no se actulice el form_pago_id
        unset($datosActualizar['form_pago_id']);

        $update = DB::table('formapago')
                    ->where('form_pago_id', '=', $form_pago_id)
                    ->update($reuqest);

        if($update > 0){
            return response()->json([
                'message'=> "Forma de pago actualizada correctamente"
            ],200);
        }else{
            return response()->json([
                'message'=> "Error al actualizar la forma de pago"
            ],404);
        }
   }

   public function deleteFormaPago($form_pago_id){
        $delete = DB::table('formapago')
                  ->where('form_pago_id', '=', $form_pago_id)
                  ->delete();

        if($delete > 0){
            return response()->json([
                'message'=> "Forma de pago eliminada correctamente"
            ],200);
        }else{
            return response()->json([
                'message'=> "Error al eliminar la forma de pago"
            ],404);
        }
   }
}
