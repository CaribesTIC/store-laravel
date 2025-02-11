<?php

namespace Modules\Common\Http\Controllers\MeasureUnit;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\MeasureUnit\MuMeasureUnitType;

class MuMeasureUnitTypeController extends Controller
{
    public function get()
    {        
        return MuMeasureUnitType::select('id', 'description')
               ->get(); 
    }
}
