<?php

namespace Modules\Common\Http\Controllers\MeasureUnit;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\MeasureUnit\MuContainer;

class MuContainerController extends Controller
{
    public function get()
    {        
        return MuContainer::select('id', 'description')
               ->get(); 
    }
}


