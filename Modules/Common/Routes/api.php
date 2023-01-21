<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/common', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'common'], function() {
    Route::group(['prefix' => 'measure-unit'], function() {
      Route::get('container', 'Modules\Common\Http\Controllers\MuContainerController@get');
      //Route::get('type', 'MeasureUnit\MuMeasureUnitTypeController@get');
      //Route::get('/{muMeasureUnitTypeId}', 'MeasureUnit\MuMeasureUnitController@get');    
   });
});


