<?php

namespace Modules\Product\Http\Services\Product;

//use App\Http\Resources\UserCollection;
//use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Product;

class IndexProductService
{

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    static public function execute(Request $request): JsonResponse
    {          
        // Initialize query          
        $query = Product::query()
            ->select(
                "products.id",
                "products.name as product",
                "marks.name as mark",
                "view_categories.family as category"
            )       
            ->join("view_categories", "view_categories.id", "=", "products.category_id")     
            ->join("marks", "marks.id", "=", "products.mark_id");

        // search 
        $search = $request->input("search");
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where("products.name", "like", "%$search%");
                    //->orWhere("email", "like", "%$search%");
            });
        }

        // sort 
        $sort = $request->input("sort");
        $direction = $request->input("direction") === "desc" ? "desc" : "asc";        
        ($sort)
            ? $query->orderBy($sort, $direction) 
                : $query->orderBy("product", "asc");

        // get paginated results 
        $products = $query
            ->paginate(5)
            ->appends(request()->query());

        return response()->json([
            "rows" => $products,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);
    }

}
