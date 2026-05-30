<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ColorHiloController;
use App\Http\Controllers\BordadoController;
use App\Http\Controllers\ForroController;
use App\Http\Controllers\TelaController;
use App\Http\Controllers\ColorTelaController;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

//Rutas Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    //Rutas Usuario
    Route::apiResource('usuarios', UsuarioController::class);

    //Rutas ColorHilo
    Route::apiResource('colores-hilo', ColorHiloController::class);

    //Rutas Bordado
    Route::apiResource('bordados', BordadoController::class);

    //Rutas Forro
    Route::apiResource('forros', ForroController::class);

    //Rutas Tela
    Route::apiResource('telas', TelaController::class);

    //Rutas ColorTela
    Route::apiResource('colores-tela', ColorTelaController::class);
});