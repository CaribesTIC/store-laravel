<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\State;

class StateController extends Controller
{
    public function get()
    {        
        $states = State::select('id', 'description')->get();
        return response($states, 200);               
    }
}
