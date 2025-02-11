<?php
namespace Modules\Article\Http\Services\Article;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Article\Http\Requests\Article\UpdateArticleRequest;
use Modules\Article\Entities\Article;

class UpdateArticleService
{
    static public function execute(UpdateArticleRequest $request, Article $article): JsonResponse
    {          
        // $article = Article::find($request->id);

        $article->int_cod = $request->int_cod;
        $article->name = $request->name;
        $article->price = $request->price;
        $article->stock_min = $request->stock_min;
        $article->stock_max = $request->stock_max;
        $article->status = $request->status;
        $article->photo = $request->photo;
        $article->id_user_update = Auth::user()->id;
        
        $article->save();

        return response()->json([
            "message"=> "Record updated successfully"
        ], 200);      
    }
}

