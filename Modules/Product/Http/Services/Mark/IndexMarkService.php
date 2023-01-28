<?php

namespace Modules\Product\Http\Services\Mark;

//use App\Http\Resources\UserCollection;
//use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Mark;

class IndexMarkService
{

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    static public function execute(Request $request): JsonResponse
    {          
        // Initialize query 
        $query = Mark::query();

        // search 
        $search = $request->input("search");
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where("name", "like", "%$search%");
                    //->orWhere("email", "like", "%$search%");
            });
        }

        // sort 
        $sort = $request->input("sort");
        $direction = $request->input("direction") == "desc" ? "desc" : "asc";
        
        //if ($sort) { $query->orderBy($sort, $direction); } 
        if ($sort) {
            $query->orderBy($sort, $direction);
        }

        // get paginated results 
        $marks = $query
            ->paginate(5)
            ->appends(request()->query());

        return response()->json([
            "rows" => $marks,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);
    }

}
