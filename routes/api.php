<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PorcentajeController;
use App\Http\Controllers\CondicionIvaController;
use App\Http\Controllers\HistorialStockController;

//Usuario
Route::post('/login', [UsuarioController::class, 'login']);

//Localidad
Route::get('/localidades', [LocalidadController::class, 'getLocalidades']);


//Cliente
Route::get('/clientes', [ClienteController::class, 'getClientes']);
Route::post('/clientes/nuevo', [ClienteController::class, 'createCliente']);
Route::put('/clientes/actualizar/{cli_id}', [ClienteController::class, 'updateCliente']);
Route::delete('/clientes/eliminar/{cli_id}', [ClienteController::class, 'deleteCliente']);//Esta api se usara en caso especiales, si se quiere eliminar un cliente por lo general se le cambiara el estado
Route::put('/clientes/estado/{cli_id}/{cli_activo}', [ClienteController::class, 'estadoCliente']);


//Producto
Route::get('/producto', [ProductoController::class, 'getProducto']);
Route::post('/producto/nuevo', [ProductoController::class, 'createProducto']);
Route::put('/producto/actualizar/{prod_id}', [ProductoController::class, 'updateProducto']);
Route::get('/producto/buscar/{prod_cod_barra}', [ProductoController::class, 'getCodigoBarra']);
Route::get('/producto/sinPorcentaje', [ProductoController::class, 'getProductosSinPorcentaje']);
Route::post('/producto/buscar', [ProductoController::class, 'buscarProducto']);
Route::post('/producto/buscarSinPorcentaje', [ProductoController::class, 'busquedaProductosSinPorcentaje']);



//Proveedor
Route::get('/proveedor', [ProveedorController::class, 'getProveedor']);
Route::post('/proveedor/nuevo', [ProveedorController::class, 'createProveedor']);
Route::put('/proveedor/actualizar/{prov_id}', [ProveedorController::class, 'updateProveedor']);


//Stock
Route::post('/stock/nuevo', [StockController::class, 'createStock']);
Route::put('/stock/actualizar/{stock_id}', [StockController::class, 'updateStock']);
Route::put('/stock/incrementar/{stock_id}', [StockController::class, 'incrementStock']);
Route::put('/stock/decrementar/{stock_id}', [StockController::class, 'decrementStock']);


//Historial Stock
Route::post('/historialStock/nuevo', [HistorialStockController::class, 'createHistorial']);

//Condicion Iva
Route::get('/CondicionIva', [CondicionIvaController::class, 'getCondicionIva']);


//Porcentaje
Route::post('/porcentaje/nuevo', [PorcentajeController::class, 'createPorcentaje']);
Route::get('/porcentaje/conPorcentaje', [PorcentajeController::class, 'getProductosConPorcentaje']);    