<?php
namespace Modules\Product\Http\Services\Product;

use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\Product\StoreProductRequest;

class StoreProductService
{
  
    static public function execute(StoreProductRequest $request): JsonResponse
    {     
        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->mark_id = $request->mark_id;
        $product->measure_unit_type_id = $request->measure_unit_type_id;
        $product->measure_unit_id = $request->measure_unit_id;
        $product->measure_unit = $request->measure_unit;
        
        $product->save();       

        return response()->json([
            'message' => 'Producto creado',
            'product_id' => $product->id
        ], 201);
    }

}
