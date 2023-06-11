<?php

use App\Http\Controllers\Auth\Api\loginController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\CardapioMesaController;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function () {
    Route::post('/login', [loginController::class, 'login']);
    Route::post('/registro', [loginController::class, 'registro']);
});


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::prefix('/users')->group(function () {
      //rotas de mesas
        Route::get('/{id}/mesa', [MesasController::class, 'getId'])->middleware('auth');
        Route::post('/mesa', [MesasController::class, 'store' ] )->middleware('auth');
        Route::put('/mesa/{id}', [MesasController::class, 'update' ] )->middleware('auth');
        Route::get('/mesa/{id}', [MesasController::class, 'show'])->middleware('auth');
        Route::delete('/mesa/{id}', [MesasController::class, 'destroy'])->middleware('auth');

        //rotas de carpadios
        Route::get('/{id}/cardapio', [CardapioController::class, 'getIdCardapio'])->middleware('auth');
        Route::post('/cardapio', [CardapioController::class, 'store'])->middleware('auth');
        Route::get('/cardapio/{id}', [CardapioController::class, 'show'])->middleware('auth');
        Route::delete('/cardapio/{id}', [CardapioController::class, 'destroy'])->middleware('auth');

        //rotas da tabela pivo
        Route::post('/cardapioMesa', [CardapioMesaController::class, 'store'])->middleware('auth');
        Route::delete('/cardapioMesa/{mesas_id}/{cardapio_id}', [CardapioMesaController::class, 'destroy'])->middleware('auth');
        Route::get('/cardapioMesa', [CardapioMesaController::class, 'index' ] )->middleware('auth');
        Route::delete('/cardapioMesaTotal/{mesas_id}', [CardapioMesaController::class, 'destroyTotalMesa'])->middleware('auth');
    });
});



