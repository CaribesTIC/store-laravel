<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Store\Actions\ExistenceAction;
use Modules\Store\Http\Controllers\{
    MovementController,
    MovementDetailController,
    DailyClosingController,
    SubWarehouseController
};

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

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

//Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//    Route::apiResource('store', StoreController::class)->names('store');
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

    Route::get('/summary', [ExistenceAction::class, 'index'] );

    Route::prefix('movement_details')->group(function () {  
        Route::get('/{movementId}', [MovementDetailController::class, 'getAllByMovement']);
        Route::get('/{movement_detail}', [MovementDetailController::class, 'show']);
        Route::post('/', [MovementDetailController::class, 'store']);
        Route::put('/{movement_detail}', [MovementDetailController::class, 'update']);
        Route::delete('/{id}', [MovementDetailController::class,'destroy']);
    });
    Route::get('/movement_details_by_number/{supportNumber}/{typeId}', [MovementDetailController::class, 'getAllByNumber']);


    Route::prefix('daily-closings')->group(function () { 
        Route::get('/', [DailyClosingController::class, 'index']);
        Route::get('/pre', [DailyClosingController::class, 'getPreDailyClosing']);
        Route::get('/{close}', [DailyClosingController::class, 'show']);
        Route::post('/', [DailyClosingController::class, 'store']);
    });

    Route::prefix('sub_warehouses')->group(function () {
        Route::get('/', [SubWarehouseController::class, 'index']);
        Route::get('/{sub_warehouse}', [SubWarehouseController::class, 'show']);
        Route::post('/', [SubWarehouseController::class, 'store']);
        Route::put('/{sub_warehouse}', [SubWarehouseController::class, 'update']);
        Route::delete('/{id}', [SubWarehouseController::class,'destroy']);
    });
    Route::get('/sub_warehouses-help', [SubWarehouseController::class, 'help']);
});
