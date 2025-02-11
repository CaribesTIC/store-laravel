<?php

namespace Modules\Common\Http\Controllers\GeoLocation;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Common\Entities\GeoLocation\{
  State,
  Municipality,
  Parish,
  ZoneType,
  RouteType,
  DomicileType
};

class GeoLocationController extends Controller
{
    public function get(Request $request)
    {
        $ids = explode(",", $request->ids);
        $geoLocation = [];
        $geoLocation['state'] = State::select('description')->where('id', $ids[0])->first()->description;
        $geoLocation['municipality'] = Municipality::select('description')->where('id', $ids[1])->first()->description;
        $geoLocation['parish'] = Parish::select('description')->where('id', $ids[2])->first()->description;
        $geoLocation['zone_type'] = ZoneType::select('description')->where('id', $ids[3])->first()->description;
        $geoLocation['route_type'] = RouteType::select('description')->where('id', $ids[4])->first()->description;
        $geoLocation['domicile_type'] = DomicileType::select('description')->where('id', $ids[5])->first()->description;
        return response($geoLocation, 200);               
    }
}
