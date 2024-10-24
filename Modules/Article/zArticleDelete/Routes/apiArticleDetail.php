<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Article\Http\Controllers\ArticleDetailController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('article_details')->group(function () {  
        Route::get('/{articleId}', [ArticleDetailController::class, 'getAllByArticle']);
        Route::get('/{article_detail}', [ArticleDetailController::class, 'show']);
        Route::post('/', [ArticleDetailController::class, 'store']);
        Route::put('/{article_detail}', [ArticleDetailController::class, 'update']);
        Route::delete('/{id}', [ArticleDetailController::class,'destroy']);
    });
});
