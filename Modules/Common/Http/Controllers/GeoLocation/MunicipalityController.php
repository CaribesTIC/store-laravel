<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\Municipality;

class MunicipalityController extends Controller
{
    public function get(Request $request)
    {       
        return Municipality::select('id', 'description')
            ->where('state_id', $request->stateId)
            ->get();        
    }
}
