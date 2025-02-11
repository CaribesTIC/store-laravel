<?php

namespace Modules\Article\Http\Services\ArticleDetail;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\Article\Entities\ArticleDetail;

class StoreArticleDetailService
{
    public function execute(Request $request): JsonResponse
    {
        // Validate the request data
        $request->validate([
            '*.article_id' => 'required|integer',
            '*.id' => 'required|integer',
            '*.quantity' => 'required|integer',
        ]);

        // Delete existing details for the article
        if($request->all() && count($request->all()) > 0) {
            ArticleDetail::where('article_id', intval($request[0]["article_id"]))->forceDelete();
        }
        

        foreach ($request->all() as $rqst) {
            $articleDetail = new ArticleDetail();
            $articleDetail->article_id = $rqst["article_id"];
            $articleDetail->presentation_id = $rqst["id"];
            $articleDetail->quantity = $rqst["quantity"];
            // $articleDetail->status = 1; // You might want to set a default or get this from the request
            // $articleDetail->user_insert_id = Auth::user()->id; // Make sure Auth is available or handle differently
            // $articleDetail->user_update_id = Auth::user()->id;

            $articleDetail->save();
        }

        return response()->json([
            'message' => 'Article details created successfully',
        ], 201);
    }
}