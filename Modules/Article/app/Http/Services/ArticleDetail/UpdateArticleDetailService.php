<?php
namespace Modules\Article\Http\Services\ArticleDetail;

use Illuminate\Http\JsonResponse;
use Modules\Article\Entities\ArticleDetail;
use Modules\Article\Http\Requests\ArticleDetail\UpdateArticleDetailRequest;

class UpdateArticleDetailService
{
  
    static public function execute(UpdateArticleDetailRequest $request, ArticleDetail $article_detail): JsonResponse
    {     
        
        $article_detail->article_id = $request->article_id;
        $article_detail->presentation_id = $request->presentation_id;
        $article_detail->quantity = $request->quantity;
        $article_detail->status = $request->status;
        $article_detail->user_insert_id = $request->user_insert_id;
        $article_detail->user_update_id = $request->user_update_id;

        $article_detail->save();        

        return response()->json([
            'message' => 'ArticleDetail updated'            
        ], 200);
    }

}
