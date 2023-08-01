<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    public function createProducto(ProductoRequest $request){
        $productoNuevo = $request->all();
        $productoCreado = Producto::create($productoNuevo);

        if($productoCreado instanceof Producto){
            $getProducto = Producto::where('prod_id', '=', $productoCreado->id)
                            ->select('producto.*')
                            ->get();
            return response()->json([
                'message'=> "Producto creado correctamente",
                'productos'=> $getProducto 
            ],201);
        }else{
            return response()->json([
                'message'=> "Error al crear el producto"
            ], 404);
        }
    }

    public function getProducto(){
        $producto = Producto::leftjoin('proveedor', 'producto.prov_id', '=', 'proveedor.prov_id')
                            ->leftjoin('stock', 'producto.prod_id', '=', 'stock.prod_id')
                            ->select('producto.*', 'proveedor.prov_nombre', 'stock.stock_cantidad')
                            ->get();
        if($producto->isEmpty()){
            return response()->json([
                'message'=> "No se encontraron productos"
            ], 404);
        }else{
            return response()->json([
                'message'=> "Productos cargados",
                'productos' => $producto,
            ], 200);
        }
    }


    public function updateProducto(ProductoRequest $request, $prod_id){
        $update = '';
        $datosActualizar = $request->all();

        //Me aseguro que no se actulice el prod_id
        unset($datosActualizar['prod_id']);

        $update = DB::table('producto')
                            ->where('prod_id', $prod_id)
                            ->update($datosActualizar);
        
        if($update > 0){
            return response()->json([
                'message'=> "Producto actualizado correctamente"
            ], 200);
        }else{
            return response()->json([
                'message'=> "No se encontro el producto o no se pudo actualizar"
            ], 404);
        }
    }

    public function getCodigoBarra($prod_cod_barra){
        $producto = Producto::leftjoin('proveedor', 'producto.prov_id', '=', 'proveedor.prov_id')
                            ->leftjoin('stock', 'producto.prod_id', '=', 'stock.prod_id')
                            ->select('producto.*', 'proveedor.prov_nombre', 'stock.stock_cantidad')
                            ->where('prod_cod_barra', '=', $prod_cod_barra)
                            ->get();

        if($producto->isEmpty()){
            return response()->json([
                'message'=> "No se encontro un producto con ese codigo de barra"
            ], 404);
        }else{
            return response()->json([
                'message'=> "Producto cargado",
                'productos'=> $producto
            ], 200);
        }
    }

}
