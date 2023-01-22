<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\RouteType;

class RouteTypeController extends Controller
{
    public function get()
    {        
        return RouteType::select('id', 'description')
               ->get(); 
    }
}
