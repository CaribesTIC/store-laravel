<?php
namespace Modules\Product\Http\Services\Presentation;

use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Presentation;
use Modules\Product\Http\Requests\Presentation\StorePresentationRequest;

class StorePresentationService
{
  
    static public function execute(StorePresentationRequest $request): JsonResponse
    {     
        $presentation = new Presentation();

        $presentation->product_id = $request->product_id;
        $presentation->sale_type = $request->sale_type;
        $presentation->int_cod = $request->int_cod;
        $presentation->bar_cod = $request->bar_cod;
        // $presentation->packing = $request->packing_deployed;
        // $presentation->packing_json = $request->packing_json;
        $presentation->packing = $request->packing_json;
        $presentation->price = $request->price;
        $presentation->stock_max = $request->stock_max;
        $presentation->status = $request->status;
        
        $presentation->save();
        $presentation->refresh();

        return response()->json([
            'message' => 'Presentación creada',
            'presentation_id' => $presentation->id
        ], 201);
    }

}
