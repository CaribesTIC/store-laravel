<?php

namespace Modules\Common\Http\Controllers\MeasureUnit;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\MeasureUnit\MuMeasureUnit;

class MuMeasureUnitController extends Controller
{
    public function get(Request $request)
    {        
        return MuMeasureUnit::select('id', 'description')
               ->where('mu_measure_unit_types_id', $request->muMeasureUnitTypeId)
               ->get(); 
    }
}
