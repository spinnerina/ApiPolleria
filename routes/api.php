<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalidadController;

Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/localidades', [LocalidadController::class, 'getLocalidades']);
//Cliente
Route::get('/clientes', [ClienteController::class, 'getClientes']);
Route::post('/clientes/nuevo', [ClienteController::class, 'createCliente']);
Route::put('/clientes/actualizar/{cli_id}', [ClienteController::class, 'updateCliente']);
Route::delete('/clientes/eliminar/{cli_id}', [ClienteController::class, 'deleteCliente']);//Esta api se usara en caso especiales, si se quiere eliminar un cliente por lo general se le cambiara el estado
Route::put('/clientes/estado/{cli_id}/{cli_activo}', [ClienteController::class, 'estadoCliente']);

