<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Article\Http\Resources\ArticleResource;
use Modules\Article\Http\Requests\Article\{
    StoreArticleRequest,
    UpdateArticleRequest
};
use Modules\Article\Http\Services\Article\{
    StoreArticleService,
    IndexArticleService,
    UpdateArticleService
};
use Modules\Article\Entities\Article;
//use Modules\Product\Entities\Presentation;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return IndexArticleService::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreArticleRequest $request): JsonResponse
    {
        return StoreArticleService::execute($request);
    }

    /**
     * Display the specified resource.
    */
    public function show(Article $article): ArticleResource | JsonResponse
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */     
    public function update(UpdateArticleRequest $request, Article $article): JsonResponse
    {
        return UpdateArticleService::execute($request, $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {      
        Article::destroy($request->id);
        return response()->json(204);
    }

    /*
     * Display a listing of the resource to help.
     */
    public function help(): JsonResponse
    {
        return response()->json(Article::all());
    }

    public function search(Request $request): JsonResponse
    {
        // Initialize query


        /*
                            //articles.bar_cod,                
                    //articles.price,
                    //articles.status,
                    //articles.photo_path,
                    //presentation_deploy(presentations.id) as packing_deployed,                    
                    //products.name as product_name,
                    //categories.name as category_name,
                    //marks.name as mark_name
        */
        $query = Article::query()
            ->select(           
                DB::raw("
                    articles.*
                ")
            )
            //->join("products"  , "products.id"  , "=", "presentations.product_id")
            //->join("categories", "categories.id", "=", "products.category_id")
            //->join("marks", "marks.id", "=", "products.mark_id")
            ;
            
        // search 
        $search = strtoupper($request->input("search"));
        if ($search) {
            $query->where(function ($query) use ($search) {
                //$query
                    //->where  (DB::raw("UPPER(bar_cod)"        ), "like", "%$search%")
                    //->orWhere(DB::raw("UPPER(products.name)"  ), "like", "%$search%")
                    //->orWhere(DB::raw("UPPER(categories.name)"), "like", "%$search%")
                    //->orWhere(DB::raw("UPPER(marks.name)"     ), "like", "%$search%")
                //    ;
            });
        }

        // sort 
        $sort = $request->input("sort");
        $direction = $request->input("direction") === "desc" ? "desc" : "asc";        
        ($sort)
            ? $query->orderBy($sort, $direction) 
                : $query->orderBy("articles.id", "asc");

        // get paginated results 
        $presentations = $query
            ->paginate(5)
            ->appends(request()->query());

        return response()->json([
            "rows" => $presentations,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);
    }
}
