<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    public function getLocalidades(){
        $localidades = Localidad::all();

        if($localidades->isNotEmpty()){
            return response()->json(['message' => 'Localidades obtenidas', 'localidades' => $localidades], 200);
        }else{
            return response()->json(['message' => 'No se encontraron localidades guardadas'],404);
        }
    }
}
