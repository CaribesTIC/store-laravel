<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;

use Modules\Product\Entities\Presentation;
use Modules\Product\Http\Requests\Presentation\{
    StorePresentationRequest,
    UpdatePresentationRequest    
};
use Modules\Product\Http\Services\Presentation\{
    //IndexPresentationService,
    StorePresentationService,
    UpdatePresentationService
};
use Illuminate\Support\Facades\Storage;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     */
    public function getAllByProduct(Request $request): Collection
    {
        return Presentation::select(
            DB::raw("* ,presentation_deploy(presentations.id) as packing_deployed")
        )
        ->where("product_id", $request->productId)
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     */    
    public function store(StorePresentationRequest $request): JsonResponse
    {    
        return StorePresentationService::execute($request);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresentationRequest $request, Presentation $presentation): JsonResponse
    {
        return UpdatePresentationService::execute($request, $presentation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            Presentation::destroy($request->id);
            $directory = 'public/Product/presentations/presentation-' . $request->id;
            if (Storage::disk('local')->exists($directory)) {
                Storage::deleteDirectory($directory);              
            }  
            return response()->json(204);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 409);
        }        
    }
    
    public function fileUpload(Request $request, Presentation $presentation): JsonResponse
    {      
      try {
          $directory = 'public/Product/presentations/presentation-' . $presentation->id;
          if (Storage::disk('local')->exists($directory)) {
              Storage::deleteDirectory($directory);              
          }          
          $filePath = Storage::disk('local')->putFile($directory, $request->file, 'public');          
          $presentation->photo_path = str_replace("public", "storage", $filePath);
          $presentation->save();          
      } catch (Exception $exception) {
          return response()->json(['message' => $exception->getMessage()], 409);
      }//return new PresentationResource($presentation);
      return response()->json(['message' => 'Photo uploaded'], 201);
      
    }
    
    
    public function search(Request $request): JsonResponse
    {
        // Initialize query
        $query = Presentation::query()
            ->select(           
                DB::raw("
                    presentations.bar_cod,                
                    presentations.price,
                    presentations.status,
                    presentations.photo_path,
                    presentation_deploy(presentations.id) as packing_deployed,                    
                    products.name as product_name,
                    categories.name as category_name,
                    marks.name as mark_name
                ")
            )
            ->join("products"  , "products.id"  , "=", "presentations.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("marks", "marks.id", "=", "products.mark_id");
            
        // search 
        $search = strtoupper($request->input("search"));
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where  (DB::raw("UPPER(bar_cod)"        ), "like", "%$search%")
                    ->orWhere(DB::raw("UPPER(products.name)"  ), "like", "%$search%")
                    ->orWhere(DB::raw("UPPER(categories.name)"), "like", "%$search%")
                    ->orWhere(DB::raw("UPPER(marks.name)"     ), "like", "%$search%");
            });
        }

        // sort 
        $sort = $request->input("sort");
        $direction = $request->input("direction") === "desc" ? "desc" : "asc";        
        ($sort)
            ? $query->orderBy($sort, $direction) 
                : $query->orderBy("presentations.id", "asc");

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

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    /*static public function search(Request $request): JsonResponse
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
            ->paginate(500)
            ->appends(request()->query());

        return response()->json([
            "rows" => $products,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);
    }*/




}
