<?php

namespace App\Http\Controllers;

use App\Models\CondicionIva;
use Illuminate\Http\Request;

class CondicionIvaController extends Controller
{
    public function getCondicionIva(){
        $condicionIva = CondicionIva::where('iva_habilitado', true)
                                    ->select('condicioniva.*')
                                    ->get();

        if($condicionIva->isEmpty()){
            return response()->json(['message' => 'No existen condiciones agregadas o habilitadas']);
        }else{
            return response()->json(['message' => 'Condiciones obtenidas', 'condicionIva' => $condicionIva]);
        }
    }
}
