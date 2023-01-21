<?php

namespace Modules\Common\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
//use App\MeasureUnit\MuContainer;
use Modules\Common\Entities\MuContainer;


class MuContainerController extends Controller
{
    public function get()
    {        
        return MuContainer::select('id', 'description')
               ->get(); 
    }
}


