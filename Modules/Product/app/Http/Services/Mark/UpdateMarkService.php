<?php
namespace Modules\Product\Http\Services\Mark;

use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Mark;
use Modules\Product\Http\Requests\Mark\UpdateMarkRequest;



class UpdateMarkService
{
    static public function execute(UpdateMarkRequest $request, Mark $mark) : JsonResponse
    {
        $data = $request->all();

        $mark->update( $request->except( '_method' ) );
            
        

        return response()->json(["message"=> "Marca actualizado"], 200);      
    }
}
