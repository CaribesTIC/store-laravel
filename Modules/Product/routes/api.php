<?php

use Illuminate\Support\Facades\Route;
//use Modules\Product\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\{
    CategoryController,
    MarkController,
    ProductController,
    PresentationController
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
//    Route::apiResource('product', ProductController::class)->names('product');
//});

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

/*Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->user();
});*/


Route::prefix('category')->group(function () {
    Route::get('/get/{type}/{value?}', [CategoryController::class, 'get']);
    Route::post('/regist', [CategoryController::class, 'regist']);
    Route::delete('/remove/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('marks')->group(function () {
  Route::get('/', [MarkController::class, 'index']);
  Route::get('/list', [MarkController::class, 'list']);
  Route::get('/{mark}', [MarkController::class, 'show']);
  Route::post('/', [MarkController::class, 'store']);
  Route::put('/{mark}', [MarkController::class, 'update']);
  Route::delete('/{id}', [MarkController::class,'destroy']);
});

Route::prefix('products')->group(function () {
  Route::get('/', [ProductController::class, 'index']);  
  Route::get('/{product}', [ProductController::class, 'show']);
  Route::post('/', [ProductController::class, 'store']);
  Route::put('/{product}', [ProductController::class, 'update']);
  Route::delete('/{id}', [ProductController::class,'destroy']);
});

Route::get('/presentation-search', [PresentationController::class,'search']);
Route::prefix('presentations')->group(function () {
  Route::get('/{productId}', [PresentationController::class, 'getAllByProduct']);
  Route::get('/{presentation}', [PresentationController::class, 'show']);
  Route::post('/', [PresentationController::class, 'store']);
  Route::put('/{presentation}', [PresentationController::class, 'update']);
  Route::delete('/{id}', [PresentationController::class,'destroy']);
});
Route::post('/presentation-fileupload/{presentation}', [PresentationController::class,'fileUpload']);  



/*Route::get('/product/get/{type}/{value0?}/{value1?}', [ProductController::class, 'get']);
Route::post('/product/regist', [ProductController::class, 'regist']);
Route::post('/product/photo', [ProductController::class, 'photo']);
//Route::delete('/product/remove/{id}', [ProductController::class, 'destroy']);
*/

//Route::get('/presentation/{type}/{value0?}/{value1?}', [PresentationController::class, 'get']);
//Route::post('/presentation/regist', [PresentationController::class, 'regist']);
//Route::delete('/presentation/remove/{id}', [PresentationController::class, 'destroy']);
