<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
{
    public function createProveedor(ProveedorRequest $request){
        $proveedor = $request->all();
        $proveedorCreado = Proveedor::create($proveedor);

        if($proveedorCreado instanceof Proveedor){
            return response()->json([
                'message'=> "Proveedor creado con exito"
            ], 201);
        }else{
            return response()->json([
                'message'=> "Error al crear el proveedor"
            ],404);
        }
        
    }

    public function getProveedor(){
        $proveedor = Proveedor::leftjoin('localidad', 'proveedor.loc_id', '=' , 'localidad.loc_id')
                                ->select('proveedor.*', 'localidad.loc_nombre')
                                ->get();
        
        if($proveedor->isEmpty()){
            return response()->json([
                'message'=> "No se encontro ningun proveedor"
            ]);
        }else{
            return response()->json([
                'message'=> "Proveedores cargados",
                'proveedores' => $proveedor
            ]);
        }
    }


    public function updateProveedor(ProveedorRequest $request, $prov_id){
        $update = '';
        $datosActualizar = $request->all();

        //Me aseguro que no se actulice el cli_id
        unset($datosActualizar['prov_id']);

        $update = DB::table('proveedor')
                            ->where('prov_id', $prov_id)
                            ->update($datosActualizar);
        
        if($update > 0){
            return response()->json([
                'message'=> "Proveedor actualizado correctamente"
            ], 200);
        }else{
            return response()->json([
                'message'=> "No se encontro el proveedor o no se pudo actualizar"
            ], 404);
        }
    }


}
