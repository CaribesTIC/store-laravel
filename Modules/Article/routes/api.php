<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Article\Http\Controllers\ArticleController;
use Modules\Article\Http\Controllers\ArticleDetailController;

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

//Route::middleware('auth:api')->get('/article', function (Request $request) {
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
//    Route::apiResource('article', ArticleController::class)->names('article');
//});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/articles-search', [ArticleController::class,'search']);
    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index']);
        Route::get('/{article}', [ArticleController::class, 'show']);
        Route::post('/', [ArticleController::class, 'store']);
        Route::put('/{article}', [ArticleController::class, 'update']);
        Route::delete('/{id}', [ArticleController::class,'destroy']);
    });
    Route::get('/articles-help', [ArticleController::class, 'help']);

    Route::prefix('article_details')->group(function () {  
        Route::get('/{articleId}', [ArticleDetailController::class, 'getAllByArticle']);
        Route::get('/{article_detail}', [ArticleDetailController::class, 'show']);
        Route::post('/', [ArticleDetailController::class, 'store']);
        Route::put('/{article_detail}', [ArticleDetailController::class, 'update']);
        Route::delete('/{id}', [ArticleDetailController::class,'destroy']);
    });
});
