<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Store\Http\Controllers\MovementController;
use Modules\Store\Http\Controllers\MovementDetailController;
use Modules\Store\Actions\ExistenceAction;

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

//Route::middleware('auth:api')->get('/store', function (Request $request) {
//    return $request->user();
//});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('movements')->group(function () {
        Route::get('/{typeId?}', [MovementController::class, 'index']);        
        Route::get('/{movement}/{typeId}', [MovementController::class, 'show']);
        Route::post('/{typeId}', [MovementController::class, 'store']);
        Route::put('/{movement}', [MovementController::class, 'update']);
        Route::delete('/{typeId}/{id}', [MovementController::class,'destroy']);
    });

    /*Route::prefix('movements')->group(function () {
        Route::get('/', [MovementController::class, 'index']);
        Route::get('/{movement}', [MovementController::class, 'show']);
        Route::post('/', [MovementController::class, 'store']);
        Route::put('/{movement}', [MovementController::class, 'update']);
        Route::delete('/{id}', [MovementController::class,'destroy']);
    });*/

    Route::get('/movements-help', [MovementController::class, 'help']);

    Route::get('/existences', [ExistenceAction::class, 'index'] );


    Route::prefix('movement_details')->group(function () {  
        Route::get('/{movementId}', [MovementDetailController::class, 'getAllByMovement']);
        Route::get('/{movement_detail}', [MovementDetailController::class, 'show']);
        Route::post('/', [MovementDetailController::class, 'store']);
        Route::put('/{movement_detail}', [MovementDetailController::class, 'update']);
        Route::delete('/{id}', [MovementDetailController::class,'destroy']);
    });
});
