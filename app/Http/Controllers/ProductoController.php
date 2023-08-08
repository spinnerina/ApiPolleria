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
        
        $existeProducto = Producto::where('prod_cod', $productoNuevo['prod_cod'])->exists();

        if($existeProducto){
            return response()->json([
                'message'=> "El codigo ya existe en la base de datos"
            ],200);
        }

        $productoCreado = Producto::create($productoNuevo);

        if($productoCreado instanceof Producto){
            $getProducto = Producto::where('prod_id', '=', $productoCreado->prod_id)
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
        $return = array();
        $producto = Producto::leftjoin('proveedor', 'producto.prov_id', '=', 'proveedor.prov_id')
                            ->leftjoin('stock', 'producto.prod_id', '=', 'stock.prod_id')
                            ->leftjoin('porcentaje', 'producto.prod_id', '=', 'porcentaje.prod_id')
                            ->selectRaw('producto.*, proveedor.prov_nombre, stock.stock_cantidad, porcentaje.por_porcentaje, ROUND((producto.prod_precio_lista * (1 + (IFNULL(porcentaje.por_porcentaje, 0) / 100))), -1) as prod_precio_final')
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
                            ->leftjoin('porcentaje', 'producto.prod_id', '=', 'porcentaje.prod_id')
                            ->selectRaw('producto.*, proveedor.prov_nombre, stock.stock_cantidad, porcentaje.por_porcentaje, ROUND((producto.prod_precio_lista * (1 + (IFNULL(porcentaje.por_porcentaje, 0) / 100))), -1) as prod_precio_final')
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


    public function getProductosSinPorcentaje(){
        //Obtener id de los productos que tienen porcentajes
        $productosConPorcentaje = Producto::has('porcentaje')->pluck('prod_id')->toArray();

        $productosSinPorcentaje = Producto::whereNotIn('prod_id', $productosConPorcentaje)->get(); 

        if($productosSinPorcentaje->isEmpty()){
            return response()->json([
                'message' => "No se encontraron productos sin porcentaje asignado"
            ], 404);
        }else{
            return response()->json([
                'message' => "Productos sin porcentaje cargados",
                'productos' => $productosSinPorcentaje
            ], 200);
        }
    }


    public function buscarProducto(Request $request){
        $busqueda = $request->all();
        $productoObtenido = Producto::leftjoin('proveedor', 'producto.prov_id', '=', 'proveedor.prov_id')
                                    ->leftjoin('stock', 'producto.prod_id', '=', 'stock.prod_id')
                                    ->leftjoin('porcentaje', 'producto.prod_id', '=', 'porcentaje.prod_id')
                                    ->selectRaw('producto.*, proveedor.prov_nombre, stock.stock_cantidad, porcentaje.por_porcentaje, ROUND((producto.prod_precio_lista * (1 + (IFNULL(porcentaje.por_porcentaje, 0) / 100))), -1) as prod_precio_final')
                                    ->where($busqueda)
                                    ->get();

        if($productoObtenido->isEmpty()){
            return response()->json([
                'message'=> "No se encontro un producto con esa especificacion"
            ], 200);
        }else{
            return response()->json([
                'message'=> "Producto cargado",
                'productos'=> $productoObtenido
            ], 200);
        }
    }
 


}
