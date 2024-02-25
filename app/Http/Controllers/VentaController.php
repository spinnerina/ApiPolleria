<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Requests\VentaRequest;

class VentaController extends Controller
{
    public function getVenta()
    {
        $ventas = Venta::leftjoin('cliente', 'venta.cli_id', '=', 'cliente.cli_id')
                       ->leftjoin('formapago', 'venta.form_pago_id', '=', 'formapago.form_pago_id')
                       ->selectRaw('venta.ven_id, venta.ven_total, venta.ven_cuotas, venta.ven_fecha, cliente.cli_nombre, formapago.form_pago_descri')
                       ->get();

        if ($ventas->isEmpty()) {
            return response()->json([
                'message' => "No se encontraron ventas en la base de datos"
            ], 404);
        } else {
            return response()->json([
                'message' => "Ventas cargadas correctamente",
                'ventas' => $ventas
            ], 200);
        }
    }

    public function createVenta(VentaRequest $request)
    {
        $nuevaVenta = $request->all();
        $venta = Venta::create($nuevaVenta);

        if ($venta instanceof Venta) {
            return response()->json([
                'message' => "Venta creada correctamente"
            ], 201);
        } else {
            return response()->json([
                'message' => "Error al crear la venta"
            ], 404);
        }
    }

    public function updateVenta(VentaRequest $request, $ven_id)
    {
        $venta = $request->all();

        // Asegúrate de que no se actualice el ven_id
        unset($venta['ven_id']);

        $update = Venta::where('ven_id', $ven_id)->update($venta);

        if ($update > 0) {
            return response()->json([
                'message' => "Venta actualizada correctamente"
            ], 200);
        } else {
            return response()->json([
                'message' => "Error al actualizar la venta"
            ], 404);
        }
    }

    
    public function deleteVenta($ven_id)
    {
        $delete = Venta::where('ven_id', $ven_id)->delete();

        if ($delete > 0) {
            return response()->json([
                'message' => "Venta eliminada correctamente"
            ], 200);
        } else {
            return response()->json([
                'message' => "Error al eliminar la venta"
            ], 404);
        }
    }
}
