<?php
namespace Modules\Product\Http\Services\Product;

use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\Product\UpdateProductRequest;



class UpdateProductService
{
    static public function execute(UpdateProductRequest $request, Product $product) : JsonResponse           
    {
        //$data = $request->all();

        $product->update( $request->except( '_method' ) );

        return response()->json(["message"=> "Producto actualizado"], 200);      
    }
}
