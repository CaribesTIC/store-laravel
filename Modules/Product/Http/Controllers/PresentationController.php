<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
        Presentation::destroy($request->id);

        return response()->json(204);            
    }
    
    public function fileUpload(Request $request, Presentation $presentation): JsonResponse
    {
      {
      try {
          $filePath = Storage::disk('local')->putFileAs(
              'public/Product/presentations',
              $request->file,
              'presentation-'.$presentation->id
          );
          $presentation->photo_path = str_replace("public", "storage", $filePath);
          $presentation->save();
      } catch (Exception $exception) {
          return response()->json(['message' => $exception->getMessage()], 409);
      }//return new PresentationResource($presentation);
      return response()->json(['message' => 'Photo uploaded'], 201);
      }
    }    
}
