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
use App\Http\Controllers\PrendaPiezaController;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\AreaProduccionController;
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

Route::middleware('auth:sanctum')->group(function () {
    //Rutas Usuario
    Route::apiResource('usuarios', UsuarioController::class);

    //Rutas ColorHilo
    Route::prefix('colores-hilo')->group(function() {
        Route::get('/', [ColorHiloController::class, 'index']);
        Route::get('/all', [ColorHiloController::class, 'indexAll']);
        Route::get('/{id}', [ColorHiloController::class, 'show']);
        Route::post('/', [ColorHiloController::class, 'store']);
        Route::put('/{id}', [ColorHiloController::class, 'update']);
        Route::delete('/{id}', [ColorHiloController::class, 'destroy']);
    });

    //Rutas Bordado
    Route::prefix('bordados')->group(function() {
        Route::get('/', [BordadoController::class, 'index']);
        Route::get('/all', [BordadoController::class, 'indexAll']);
        Route::get('/{id}', [BordadoController::class, 'show']);
        Route::post('/', [BordadoController::class, 'store']);
        Route::put('/{id}', [BordadoController::class, 'update']);
        Route::delete('/{id}', [BordadoController::class, 'destroy']);
    });

    //Rutas Forro
    Route::prefix('forros')->group(function() {
        Route::get('/', [ForroController::class, 'index']);
        Route::get('/all', [ForroController::class, 'indexAll']);
        Route::get('/{id}', [ForroController::class, 'show']);
        Route::post('/', [ForroController::class, 'store']);
        Route::put('/{id}', [ForroController::class, 'update']);
        Route::delete('/{id}', [ForroController::class, 'destroy']);
    });

    //Rutas Tela
    Route::prefix('tipos-tela')->group(function() {
        Route::get('/', [TelaController::class, 'index']);
        Route::get('/all', [TelaController::class, 'indexAll']);
        Route::get('/{id}', [TelaController::class, 'show']);
        Route::post('/', [TelaController::class, 'store']);
        Route::put('/{id}', [TelaController::class, 'update']);
        Route::delete('/{id}', [TelaController::class, 'destroy']);
    });

    //Rutas ColorTela
    Route::prefix('colores-tela')->group(function() {
        Route::get('/', [ColorTelaController::class, 'index']);
        Route::get('/all', [ColorTelaController::class, 'indexAll']);
        Route::get('/{id}', [ColorTelaController::class, 'show']);
        Route::post('/', [ColorTelaController::class, 'store']);
        Route::put('/{id}', [ColorTelaController::class, 'update']);
        Route::delete('/{id}', [ColorTelaController::class, 'destroy']);
    });

    //Rutas TipoPrenda
    Route::prefix('tipos-prenda')->group(function() {
        Route::get('/', [TipoPrendaController::class, 'index']);
        Route::get('/all', [TipoPrendaController::class, 'indexAll']);
        Route::get('/{id}', [TipoPrendaController::class, 'show']);
        Route::post('/', [TipoPrendaController::class, 'store']);
        Route::put('/{id}', [TipoPrendaController::class, 'update']);
        Route::delete('/{id}', [TipoPrendaController::class, 'destroy']);
    });

    //Rutas PrendaPieza
    Route::prefix('piezas-prenda')->group(function() {
        Route::get('/', [PrendaPiezaController::class, 'index']);
        Route::get('/all', [PrendaPiezaController::class, 'indexAll']);
        Route::get('/{id}', [PrendaPiezaController::class, 'show']);
        Route::post('/', [PrendaPiezaController::class, 'store']);
        Route::put('/{id}', [PrendaPiezaController::class, 'update']);
        Route::delete('/{id}', [PrendaPiezaController::class, 'destroy']);
    });

    //Rutas Prenda
    Route::prefix('prendas')->group(function() {
        Route::get('/', [PrendaController::class, 'index']);
        Route::get('/all', [PrendaController::class, 'indexAll']);
        Route::get('/{id}', [PrendaController::class, 'show']);
        Route::post('/', [PrendaController::class, 'store']);
        Route::put('/{id}', [PrendaController::class, 'update']);
        Route::delete('/{id}', [PrendaController::class, 'destroy']);
    });

    //Rutas AreaProduccion
    Route::prefix('areas')->group(function() {
        Route::get('/', [AreaProduccionController::class, 'index']);
        Route::get('/all', [AreaProduccionController::class, 'indexAll']);
        Route::get('/{id}', [AreaProduccionController::class, 'show']);
        Route::post('/', [AreaProduccionController::class, 'store']);
        Route::put('/{id}', [AreaProduccionController::class, 'update']);
        Route::delete('/{id}', [AreaProduccionController::class, 'destroy']);
    });

    //Rutas Proceso
    Route::apiResource('procesos', ProcesoController::class);
    Route::prefix('procesos')->group(function() {
        Route::get('/', [ProcesoController::class, 'index']);
        Route::get('/all', [ProcesoController::class, 'indexAll']);
        Route::get('/{id}', [ProcesoController::class, 'show']);
        Route::post('/', [ProcesoController::class, 'store']);
        Route::put('/{id}', [ProcesoController::class, 'update']);
        Route::delete('/{id}', [ProcesoController::class, 'destroy']);
    });

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
        Route::put('/process/{id}', [LoteController::class, 'updateCurrentProcess']);
        Route::put('/close-piece/{id}', [LoteController::class, 'closePieceProduction']);
        Route::put('/close-production/{id}', [LoteController::class, 'closeProduction']);
        Route::delete('/{id}', [LoteController::class, 'destroy']);
    });

    //Rutas PrendaLote
    Route::apiResource('prenda-lote', PrendaLoteController::class);

    //Rutas InventarioPrenda
    Route::apiResource('inventario', InventarioPrendaController::class);
});