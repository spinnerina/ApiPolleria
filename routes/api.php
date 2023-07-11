<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalidadController;

Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/clientes', [ClienteController::class, 'getClientes']);
Route::get('/localidades', [LocalidadController::class, 'getLocalidades']);

