<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\Parish;

class ParishController extends Controller
{
    public function get(Request $request)
    {          
        return Parish::select('id', 'description')
            ->where('municipality_id', $request->municipalityId)
            ->get();        
    }
}
