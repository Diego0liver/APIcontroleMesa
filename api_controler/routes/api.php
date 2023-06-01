<?php

use App\Http\Controllers\Auth\Api\loginController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\CardapioMesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::prefix('auth')->group(function () {
    Route::post('/login', [loginController::class, 'login']);
    Route::post('/registro', [loginController::class, 'registro']);
});


Route::group(['middleware' => ['auth:sanctum']], function(){


});


Route::get('/mesa', [MesasController::class, 'index' ] );
Route::put('/mesa/{id}', [MesasController::class, 'update' ] );
Route::get('/mesa/{id}', [MesasController::class, 'show']);

Route::post('/cardapio', [CardapioController::class, 'store']);
Route::get('/cardapio/{id}', [CardapioController::class, 'show']);

Route::get('/cardapio', [CardapioController::class, 'index']);

Route::post('/cardapioMesa', [CardapioMesaController::class, 'store']);
Route::delete('/cardapioMesa/{mesas_id}/{cardapio_id}', [CardapioMesaController::class, 'destroy']);


Route::delete('/cardapio/{id}', [CardapioController::class, 'destroy']);

    Route::get('/cardapioMesa', [CardapioMesaController::class, 'index' ] );

    Route::delete('/cardapioMesaTotal/{mesas_id}', [CardapioMesaController::class, 'destroyTotalMesa']);
