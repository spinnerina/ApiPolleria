<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
   
    public function getClientes(){
        $clientes = Cliente::leftjoin('localidad', 'cliente.loc_id', '=' , 'localidad.loc_id')
                    ->leftjoin('condicioniva', 'cliente.iva_id', '=', 'condicioniva.iva_id')
                    ->select('cliente.*', 'localidad.loc_nombre', 'condicioniva.iva_descripcion')
                    ->where('cli_activo', '=', 1)
                    ->get();

        if($clientes->isEmpty()){
            return response()->json(['message' => 'No hay clientes registrados en la base de datos'], 404);
        }else{
            return response()->json(['message' => 'Clientes cargados', 'clientes' => $clientes], 200);
        }
    } 


    public function createCliente(ClienteRequest $request)
    {
        $clienteNuevo = $request->all();
        $clienteCreado = Cliente::create($clienteNuevo);

        if ($clienteCreado instanceof Cliente) {
            return response()->json([
                'message' => 'Cliente creado exitosamente'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Error al crear el cliente'
            ], 404);
        }
    }

    public function updateCliente(ClienteRequest $request, $cli_id){
        $update = '';
        $datosActualizar = $request->all();

        //Me aseguro que no se actulice el cli_id
        unset($datosActualizar['cli_id']);

        $update = DB::table('cliente')
                      ->where('cli_id', $cli_id)
                      ->update($datosActualizar);

        if ($update > 0) {
            return response()->json(['message' => 'Cliente actualizado correctamente'], 200);
        } else {
            return response()->json(['message' => 'No se encontró el cliente o no se realizaron cambios'], 404);
        }    
    }

    public function deleteCliente($cli_id){

        $delete = '';

        $delete = DB::table('cliente')->where('cli_id', '=', $cli_id)->delete();

        if($delete > 0){
            return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
        }else {
            return response()->json(['message' => 'No se encontró el cliente o no se realizaron cambios'], 404);
        } 
    }

    public function estadoCliente($cli_id, $cli_activo){
        $update = DB::table('cliente')
                    ->where('cli_id', $cli_id)
                    ->update(['cli_activo' => $cli_activo]);

        if($update > 0){
            return response()->json(['message' => 'Cliente actualizado correctamente'], 200);
        }else {
            return response()->json(['message' => 'No se encontró el cliente o no se realizaron cambios'], 404);
        } 
    }


}
