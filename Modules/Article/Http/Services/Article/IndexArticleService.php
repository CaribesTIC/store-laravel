<?php

namespace Modules\Article\Http\Services\Article;

use Illuminate\Http\{
    Request,
    JsonResponse
};
use Modules\Article\Entities\Article;

class IndexArticleService
{

  /**
   * Display a listing of the resource.
   */
  static public function execute(Request $request): JsonResponse
  {
      /* Initialize query */
        $query = Article::query();

        /* search */
        $search = strtolower($request->input("search"));
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                ->where(\DB::raw('lower(int_cod)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(name)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(price)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(stock_min)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(stock_max)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(status)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(photo)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(id_user_insert)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(id_user_update)') , "like", "%$search%")                
                ;
            });
        }

        /* sort */
        $sort = $request->input("sort");
        $direction = $request->input("direction") == "desc" ? "desc" : "asc";
        if ($sort) {
            $query->orderBy($sort, $direction);
        }

        /* get paginated results */
        $articles = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $articles,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);

  }  

}
