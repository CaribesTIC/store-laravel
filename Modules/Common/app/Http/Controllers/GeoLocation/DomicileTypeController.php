<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\DomicileType;

class DomicileTypeController extends Controller
{
    public function get()
    {        
        return DomicileType::select('id', 'description')
               ->get(); 
    }
}
