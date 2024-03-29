<?php

namespace Modules\Store\Actions;


use Illuminate\Http\JsonResponse;
//use Modules\Store\Entities\Existence;
use Illuminate\Support\Facades\DB;

class ExistenceAction
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $existence = DB::table('view_stock_movement')
        ->join('articles', 'view_stock_movement.article_id', '=', 'articles.id')
        ->get();

        return response()->json($existence);


        //return response()->json(Existence::all());
    }

}


