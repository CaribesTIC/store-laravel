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
        $product->save();

        return response()->json(["message"=> "Producto creado"], 201);
    }

}
