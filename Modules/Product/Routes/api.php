<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\{
    CategoryController,
    MarkController,
    ProductController,
    PresentationController
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

/*Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->user();
});*/


Route::get('/category/get/{type}/{value?}', [CategoryController::class, 'get']);
Route::post('/category/regist', [CategoryController::class, 'regist']);
Route::delete('/category/remove/{id}', [CategoryController::class, 'destroy']);

Route::prefix('marks')->group(function () {
  Route::get('/', [MarkController::class, 'index']);  
  Route::get('/{mark}', [MarkController::class, 'show']);
});
// Route::get('/mark/get/{type}/{value?}', [MarkController::class, 'get']);
//Route::post('/mark/regist', [MarkController::class, 'regist']);
//Route::delete('/mark/remove/{id}', [MarkController::class, 'destroy']);

Route::get('/product/get/{type}/{value0?}/{value1?}', [ProductController::class, 'get']);
Route::post('/product/regist', [ProductController::class, 'regist']);
Route::post('/product/photo', [ProductController::class, 'photo']);
//Route::delete('/product/remove/{id}', [ProductController::class, 'destroy']);

Route::get('/presentation/{type}/{value0?}/{value1?}', [PresentationController::class, 'get']);
Route::post('/presentation/regist', [PresentationController::class, 'regist']);
Route::delete('/presentation/remove/{id}', [PresentationController::class, 'destroy']);
