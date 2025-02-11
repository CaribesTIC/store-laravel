<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\ZoneType;

class ZoneTypeController extends Controller
{
    public function get()
    {        
        return ZoneType::select('id', 'description')
               ->get(); 
    }
}
