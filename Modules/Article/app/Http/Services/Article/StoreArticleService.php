<?php
namespace Modules\Article\Http\Services\Article;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Article\Http\Requests\Article\StoreArticleRequest;
use Modules\Article\Entities\Article;

class StoreArticleService
{
    static public function execute(StoreArticleRequest $request): JsonResponse
    {
        $article = new Article;

        $article->int_cod = $request->int_cod;
        $article->name = $request->name;
        $article->price = $request->price;
        $article->stock_min = $request->stock_min;
        $article->stock_max = $request->stock_max;
        $article->status = $request->status;
        $article->photo = $request->photo;
        $article->id_user_insert = Auth::user()->id;
        $article->id_user_update = Auth::user()->id;
        
        $article->save();

        $article->refresh();

        return response()->json([
            "message" => "New record created successfully", 
            "id" => $article->id
        ], 201);
  }

}