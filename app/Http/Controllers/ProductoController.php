<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductoRequest;
use App\Models\Porcentaje;

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
                            ->where('producto.prod_estado', '=', 1)
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
        unset($datosActualizar['prod_id'], $datosActualizar['prod_precio_final']);

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
        $productosConPorcentaje = Porcentaje::pluck('prod_id')->toArray();

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
                                    ->where(function($query) use ($busqueda) {
                                        foreach ($busqueda as $key => $value) {
                                            if ($key === 'prod_descri') {
                                                $query->orWhere($key, 'LIKE', '%' . $value . '%');
                                            } else {
                                                $query->orWhere($key, $value);
                                            }
                                        }
                                    })
                                    ->get();

        if($productoObtenido->isEmpty()){
            return response()->json([
                'message'=> "No se encontro un producto con esa especificacion"
            ], 404);
        }else{
            return response()->json([
                'message'=> "Producto cargado",
                'productos'=> $productoObtenido
            ], 200);
        }
    }
 


    //Busqueda de productos sin porcentaje
    public function busquedaProductosSinPorcentaje(Request $request){
        //Obtener id de los productos que tienen porcentajes
        $busqueda = $request->all();
        $productosConPorcentaje = Porcentaje::pluck('prod_id')->toArray();

        $productosSinPorcentaje = Producto::whereNotIn('prod_id', $productosConPorcentaje)
                                          ->where($busqueda)  
                                          ->get(); 

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


/* ---------------------------------------- Cambio de estado de producto -----------------------------------------------  */

    public function darBajaProducto(Request $request){
        $prod_cod = $request->prod_cod;
        $update = DB::table('producto')
                    ->where('prod_cod', '=', $prod_cod)
                    ->update(['prod_estado' => false]);

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


    public function darAltaProducto(Request $request){
        $prod_cod = $request->prod_cod;
        $update = DB::table('producto')
                    ->where('prod_cod', '=', $prod_cod)
                    ->update(['prod_estado' => true]);

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

/*------------------------------------------------ FIN ------------------------------------------------------------ */

    public function deleteProducto($prod_cod){
        $delete = DB::table('producto')->where('prod_cod', '=', $prod_cod)->delete();

        if($delete > 0){
            return response()->json(['message' => 'Producto eliminado correctamente'], 200);
        }else {
            return response()->json(['message' => 'No se encontró el producto o no se realizaron cambios'], 404);
        } 
    }


    //Obtengo los productos que tienen estado 0
    public function getProductoDeBaja(){
        $return = array();
        $producto = Producto::leftjoin('proveedor', 'producto.prov_id', '=', 'proveedor.prov_id')
                            ->leftjoin('stock', 'producto.prod_id', '=', 'stock.prod_id')
                            ->leftjoin('porcentaje', 'producto.prod_id', '=', 'porcentaje.prod_id')
                            ->selectRaw('producto.*, proveedor.prov_nombre, stock.stock_cantidad, porcentaje.por_porcentaje, ROUND((producto.prod_precio_lista * (1 + (IFNULL(porcentaje.por_porcentaje, 0) / 100))), -1) as prod_precio_final')
                            ->where('producto.prod_estado', '=', 0)
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

}
