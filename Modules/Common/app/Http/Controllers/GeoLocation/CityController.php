<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\City;
use Modules\Common\Entities\GeoLocation\Municipality;

class CityController extends Controller
{
    public function get(Request $request)
    {            
      $citiId = Municipality::select('city_id')
          ->find( $request->municipalityId )
          ->city_id;

      return City::select('id', 'description')
          ->where('id', $citiId)
          ->get();
     
    }    
}
