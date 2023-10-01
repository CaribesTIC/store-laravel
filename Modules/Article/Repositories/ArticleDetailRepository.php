<?php

namespace Modules\Article\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Http;
use Modules\Article\Entities\ArticleDetail;
//use Modules\Article\Entities\Article;
use Modules\Product\Entities\Presentation;

class ArticleDetailRepository extends ArticleDetail
{
    
    static public function getAllByArticle($request)//: Collection
    {
        $articleDetails = ArticleDetail::where('article_id', $request->articleId)->get();

        foreach ($articleDetails as $key => $value) {
            //$response = Http::get("http://localhost:8000/api/" . 'presentations/' . $value['presentation_id'])[0];
            //$articleDetails[$key]['category'] = $response['category'];
            //$articleDetails[$key]['name'] = $response['name'];
            //$articleDetails[$key]['mark'] = $response['mark'];
            //$articleDetails[$key]['packing_deployment'] = $response['packing_deployment'];
            
            
  
            
            
            $response = Presentation::select(
            DB::raw("* ,presentation_deploy(presentations.id) as packing_deployed")
        )->find($value['presentation_id']);
            
            $articleDetails[$key]['category'] = $response['product']['category']['name'];
            $articleDetails[$key]['product'] = $response['product']['name'];
            $articleDetails[$key]['mark'] = $response['product']['mark']['name'];
            $articleDetails[$key]['packing_deployed'] = $response['packing_deployed'];
        }


        return $articleDetails;
    }
    
}

//packing
//product
