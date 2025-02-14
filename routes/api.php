<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Listar todos los clientes
Route::get('/clients', [ClientController::class, 'index']);

//Listar un cliente
Route::get('/clients/{id}', [ClientController::class, 'show']);

//Crear un nuevo cliente
Route::post('/clients', [ClientController::class, 'store']);

//Actualiazar un cliente
Route::put('/clients/{id}', [ClientController::class, 'update']);

Route::delete('/clients/{id}', [ClientController::class, 'destroy']);
