<?php
namespace Modules\Article\Http\Services\ArticleDetail;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\Article\Entities\ArticleDetail;
use Modules\Article\Http\Requests\ArticleDetail\StoreArticleDetailRequest;

class StoreArticleDetailService
{
  
    //static public function execute(StoreArticleDetailRequest $request): JsonResponse
    static public function execute(Request $request): JsonResponse
    {

        //return response()->json($request[0]);

        ArticleDetail::where('article_id', intval($request[0]["article_id"]))->delete();

        foreach ($request->all() as $rqst) {
            $articleDetail = new ArticleDetail();
            $articleDetail->article_id = $rqst["article_id"];
            $articleDetail->presentation_id = $rqst["id"];
            $articleDetail->quantity = $rqst["quantity"];
            //$articleDetail->status = $rqst["status;
            //$articleDetail->user_insert_id = $rqst["user_insert_id;
            //$articleDetail->user_update_id = $rqst["user_update_id;
            $articleDetail->save();            
        }



        return response()->json([
            'message' => 'Article detail created',
        ], 201);
    }

}
