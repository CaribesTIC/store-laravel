<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Article\Http\Resources\ArticleResource;
use Modules\Article\Http\Requests\Article\{
    StoreArticleRequest,
    UpdateArticleRequest
};
use Modules\Article\Http\Services\Article\{
    StoreArticleService,
    IndexArticleService,
    UpdateArticleService
};
use Modules\Article\Entities\Article;

class ArticleController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexArticleService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreArticleRequest $request): JsonResponse
    {
        return StoreArticleService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Article $article): ArticleResource | JsonResponse
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateArticleRequest $request, Article $article): JsonResponse
    {
        return UpdateArticleService::execute($request, $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Article::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Article::all());
    }
}
