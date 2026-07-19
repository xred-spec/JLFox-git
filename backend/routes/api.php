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
use App\Http\Controllers\TipoPrendaController;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\PrendaProcesoController;
//use App\Http\Controllers\PrendaSubProcesoController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\PrendaLoteController;
use App\Http\Controllers\InventarioPrendaController;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

//Rutas Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

//Route::middleware('auth:sanctum')->group(function () {
    //Rutas Usuario
    Route::apiResource('usuarios', UsuarioController::class);

    //Rutas ColorHilo
    Route::apiResource('colores-hilo', ColorHiloController::class);

    //Rutas Bordado
    Route::apiResource('bordados', BordadoController::class);

    //Rutas Forro
    Route::apiResource('forros', ForroController::class);

    //Rutas Tela
    Route::apiResource('tipos-tela', TelaController::class);

    //Rutas ColorTela
    Route::apiResource('colores-tela', ColorTelaController::class);

    //Rutas TipoPrenda
    Route::apiResource('tipos-prenda', TipoPrendaController::class);

    //Rutas Prenda
    Route::apiResource('prendas', PrendaController::class);

    //Rutas Proceso
    Route::apiResource('procesos', ProcesoController::class);

    //Rutas PrendaProceso
    Route::prefix('prendas-procesos')->group(function() {
        Route::get('/', [PrendaProcesoController::class, 'index']);
        Route::get('/procesos', [PrendaProcesoController::class, 'indexWithProcess']);
        Route::get('/{id}', [PrendaProcesoController::class, 'show']);
        Route::post('/', [PrendaProcesoController::class, 'store']);
        Route::delete('/{id}', [PrendaProcesoController::class, 'delete']);
    });

    //Rutas PrendaSubProceso
    //Route::apiResource('prendas-sub-procesos', PrendaSubProcesoController::class);

    //Rutas Lote
    Route::prefix('lotes')->group(function() {
        //Route::get('/', [LoteController::class, 'index']);
        Route::get('/pendientes', [LoteController::class, 'indexPendientes']);
        Route::get('/produccion', [LoteController::class, 'indexProduccion']);
        Route::get('/terminados', [LoteController::class, 'indexTerminados']);
        Route::get('/{id}', [LoteController::class, 'show']);
        Route::post('/', [LoteController::class, 'store']);
        Route::put('/{id}', [LoteController::class, 'update']);
        Route::put('/state/{id}', [LoteController::class, 'updateState']);
        Route::delete('/{id}', [LoteController::class, 'destroy']);
    });

    //Rutas PrendaLote
    Route::apiResource('prenda-lote', PrendaLoteController::class);

    //Rutas InventarioPrenda
    Route::apiResource('inventario', InventarioPrendaController::class);
//});