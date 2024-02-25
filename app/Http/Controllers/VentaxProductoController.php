<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaXProducto;
use App\Http\Requests\VentaxProductoRequest;

class VentaxProductoController extends Controller
{
    public function getVentaxProducto()
    {
        $ventasXProductos = VentaxProducto::get();

        if ($ventasXProductos->isEmpty()) {
            return response()->json([
                'message' => "No se encontraron VentaxProducto en la base de datos"
            ], 404);
        } else {
            return response()->json([
                'message' => "VentaxProducto cargados correctamente",
                'ventasXProductos' => $ventasXProductos
            ], 200);
        }
    }

    public function createVentaxProducto(VentaxProductoRequest $request)
    {
        $nuevaVentaxProducto = $request->all();
        $ventaxProducto = VentaxProducto::create($nuevaVentaxProducto);

        if ($ventaxProducto instanceof VentaxProducto) {
            return response()->json([
                'message' => "VentaxProducto creada correctamente"
            ], 201);
        } else {
            return response()->json([
                'message' => "Error al crear VentaxProducto"
            ], 404);
        }
    }

    public function updateVentaxProducto(VentaxProductoRequest $request, $id)
    {
        $ventaxProducto = $request->all();

        // Asegúrate de que no se actualice el id
        unset($ventaxProducto['id']);

        $update = VentaxProducto::where('id', $id)->update($ventaxProducto);

        if ($update > 0) {
            return response()->json([
                'message' => "VentaxProducto actualizada correctamente"
            ], 200);
        } else {
            return response()->json([
                'message' => "Error al actualizar VentaxProducto"
            ], 404);
        }
    }

    public function deleteVentaxProducto($id)
    {
        $delete = VentaxProducto::where('id', $id)->delete();

        if ($delete > 0) {
            return response()->json([
                'message' => "VentaxProducto eliminada correctamente"
            ], 200);
        } else {
            return response()->json([
                'message' => "Error al eliminar VentaxProducto"
            ], 404);
        }
    }
}
