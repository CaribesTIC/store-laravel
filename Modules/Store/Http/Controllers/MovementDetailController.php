<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Store\Entities\MovementDetail;
//use Modules\Article\Repositories\ArticleDetailRepository;
//use Modules\Article\Http\Requests\ArticleDetail\{
//    StoreArticleDetailRequest,
//    UpdateArticleDetailRequest    
//};
//use Modules\Article\Http\Services\ArticleDetail\{
//    StoreArticleDetailService,
//    UpdateArticleDetailService
//}; 

class MovementDetailController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     */
    public function getAllByMovement(Request $request)//: Collection
    {
        //return response()->json($request, 201); $request->movementId
        
        $movementDetails = MovementDetail::
          select("articles.*", "movement_details.*")
          ->join('articles', 'movement_details.article_id', '=', 'articles.id')        
          ->where('movement_id', $request->movementId)->get();
        
        return response()->json($movementDetails);
        //return MovementDetailRepository::getAllByMovement($request);
    }

    /**
     * Store a newly created resource in storage.
     */    
    //public function store(StoreArticleDetailRequest $request): JsonResponse
    //public function store(Request $request): JsonResponse
    //{
    //    //return  response()->json($request, 201);
    //    return StoreArticleDetailService::execute($request);
    //}
    
    /**
     * Update the specified resource in storage.
     */
    //public function update(UpdateArticleDetailRequest $request, ArticleDetail $article_detail): JsonResponse
    //{
    //    return UpdateArticleDetailService::execute($request, $article_detail);
    //}

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Request $request): JsonResponse
    //{
    //    ArticleDetail::destroy($request->id);

    //    return response()->json(204);            
    //}
}
