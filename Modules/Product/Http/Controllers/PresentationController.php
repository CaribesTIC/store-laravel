<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Presentation;
use Modules\Product\Http\Services\Presentation\{
    //IndexPresentationService,
    StorePresentationService
    //UpdateProductService
};
use Modules\Product\Http\Requests\Presentation\{
    StorePresentationRequest
    //UpdatePresentationRequest    
};
use Illuminate\Support\Facades\DB;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource by parent.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        return Presentation::select(DB::raw("* ,presentation_deploy(presentations.id) as packing_deployed"))->where("product_id", $request->productId)->get();
    }




    /**
     * Store a newly created resource in storage.
     */    
    public function store(StorePresentationRequest $request): JsonResponse
    {    
        return StorePresentationService::execute($request);
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentation $presentation)
    {
        //
    }

    public function regist(Request $request)
    {
        return Presentation::regist($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Presentation::remove($id);
    }
}
