<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
//use Modules\Common\Http\Controllers\CommonController;


use Modules\Common\Http\Controllers\GeoLocation\{
    StateController,
    MunicipalityController,
    ParishController,
    CityController,
    ZoneTypeController,
    RouteTypeController,
    DomicileTypeController,
    GeoLocationController
};
use Modules\Common\Http\Controllers\MeasureUnit\{
  MuContainerController,
  MuMeasureUnitTypeController,
  MuMeasureUnitController
};

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
//    Route::apiResource('common', CommonController::class)->names('common');
//});


//Route::middleware('auth:api')->get('/common', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'geo-location'], function() {
    Route::get('state', [StateController::class, 'get']);
    Route::get('municipality/{stateId}', [MunicipalityController::class, 'get']);
    Route::get('parish/{municipalityId}', [ParishController::class, 'get']);
    Route::get('city/{municipalityId}', [CityController::class, 'get']);
    Route::get('zone-type', [ZoneTypeController::class, 'get']);
    Route::get('route-type', [RouteTypeController::class, 'get']);
    Route::get('domicile-type', [DomicileTypeController::class, 'get']);
    Route::get('{ids}', [GeoLocationController::class, 'get']);    
});


Route::group(['prefix' => 'common'], function() {
    Route::group(['prefix' => 'measure-unit'], function() {
      Route::get('containers', [MuContainerController::class, 'get']);      
      Route::get('type', [MuMeasureUnitTypeController::class, 'get']);
      Route::get('/{muMeasureUnitTypeId}',  [MuMeasureUnitController::class, 'get']);  
   });
});


