<?php

namespace App\Http\Controllers;

use App\Models\CondicionIva;
use Illuminate\Http\Request;

class CondicionIvaController extends Controller
{
    public function getCondicionIva(){
        $condicionIva = CondicionIva::where('iva_habilitado', true);

        if($condicionIva->isNotEmpty()){
            return response()->json(['message' => 'Condiciones obtenidas', 'condicionIva' => $condicionIva]);
        }else{
            return response()->json(['message' => 'No existen condiciones agregadas o habilitadas']);
        }
    }
}
