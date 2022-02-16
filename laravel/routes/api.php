<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\ChoferController;
use App\Http\Controllers\v1\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/choferes', [ChoferController::class, 'obtenerLista']);
Route::get('/choferes/{id}', [ChoferController::class, 'obtenerItem']);


Route::post('/choferes', [ChoferController::class, 'storage']);//storage=guardar
Route::put('/choferes', [ChoferController::class, 'udpate']);//actualizar
Route::patch('/choferes', [ChoferController::class, 'patch']);

Route::delete('/choferes/{id}', [ChoferController::class, 'delete']);//storage=guardar








Route::get('/clientes', [ClienteController::class, 'obtenerLista']);
Route::get('/clientes/{id}', [ClienteController::class, 'obtenerItem']);


Route::post('/clientes', [ClienteController::class, 'storage']);//storage=guardar
Route::put('/clientes', [ClienteController::class, 'udpate']);//actualizar
Route::patch('/clientes', [ClienteController::class, 'patch']);

Route::delete('/clientes/{id}', [ClienteController::class, 'delete']);//storage=guardar
