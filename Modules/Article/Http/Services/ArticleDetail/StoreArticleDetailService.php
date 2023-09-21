<?php
namespace Modules\Article\Http\Services\ArticleDetail;

use Illuminate\Http\JsonResponse;
use Modules\Article\Entities\ArticleDetail;
use Modules\Article\Http\Requests\ArticleDetail\StoreArticleDetailRequest;

class StoreArticleDetailService
{
  
    static public function execute(StoreArticleDetailRequest $request): JsonResponse
    {     
        $article_detail = new ArticleDetail();
        
        $article_detail->article_id = $request->article_id;
        $article_detail->presentation_id = $request->presentation_id;
        $article_detail->quantity = $request->quantity;
        $article_detail->status = $request->status;
        $article_detail->user_insert_id = $request->user_insert_id;
        $article_detail->user_update_id = $request->user_update_id;

        $article_detail->save();
        $article_detail->refresh();

        return response()->json([
            'message' => 'ArticleDetail created',
            'article_detail_id' => $article_detail->id
        ], 201);
    }

}
