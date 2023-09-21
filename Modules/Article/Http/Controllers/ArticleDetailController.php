<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Article\Entities\ArticleDetail;
use Modules\Article\Http\Requests\ArticleDetail\{
    StoreArticleDetailRequest,
    UpdateArticleDetailRequest    
};
use Modules\Article\Http\Services\ArticleDetail\{
    StoreArticleDetailService,
    UpdateArticleDetailService
}; 

class ArticleDetailController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     */
    public function getAllByArticle(Request $request)//: Collection
    {
        return ArticleDetail::where('article_id', $request->articleId)->get();
    }

    /**
     * Store a newly created resource in storage.
     */    
    public function store(StoreArticleDetailRequest $request): JsonResponse
    {    
        return StoreArticleDetailService::execute($request);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleDetailRequest $request, ArticleDetail $article_detail): JsonResponse
    {
        return UpdateArticleDetailService::execute($request, $article_detail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        ArticleDetail::destroy($request->id);

        return response()->json(204);            
    }
}
