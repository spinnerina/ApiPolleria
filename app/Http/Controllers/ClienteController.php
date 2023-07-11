<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
   
    public function getClientes(){
        $clientes = Cliente::where('cli_activo', true);

        if($clientes->exists()){
            return response()->json(['message' => 'Clientes cargados', 'clientes' => $clientes]);
        }else{
            return response()->json(['message' => 'No hay clientes registrados en la base de datos']);
        }
    } 


    public function createCliente(ClienteRequest $request)
    {
        $clienteNuevo = $request->all();
        $clienteCreado = Cliente::create($clienteNuevo);

        if ($clienteCreado) {
            return response()->json([
                'message' => 'Cliente creado exitosamente'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Error al crear el cliente'
            ], 500);
        
        }
    }
}
