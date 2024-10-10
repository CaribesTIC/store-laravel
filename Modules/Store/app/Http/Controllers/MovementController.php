<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Routing\Controller;
use Modules\Store\Http\Resources\MovementResource;
    
/*use Modules\Article\Http\Requests\Article\{
    StoreArticleRequest,
    UpdateArticleRequest
};*/
use Modules\Store\Http\Services\Movement\{
    StoreMovementService,
    //IndexArticleService,
    //UpdateArticleService
};
use Modules\Store\Entities\Movement;

enum MovementTypeId: string
{
    case Imput = '1';
    case Output = '2';
    case ImputReverses = '3';
    case OutputReverses = '4';

    public static function isNotValid($value)
    {
        return !self::isValid($value);
    }

    public static function isValid($value)
    {
        return in_array($value, self::values());
    }

    public static function values()
    {
        return [self::Imput->value, self::Output->value, self::ImputReverses->value, self::OutputReverses->value];
    }

    public static function names()
    {
        return [self::Imput->name, self::Output->name, self::ImputReverses->name, self::OutputReverses->name];
    }
}

class MovementController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        //return response()->json(Movement::all());
        //return IndexArticleService::execute($request);
        /* Initialize query */
        $query = Movement::query();
        if ($request->typeId)
            $query->where("type_id", $request->typeId);

        /* search */
        $search = strtolower($request->input("search"));
        /*if ($search) {
            $query->where(function ($query) use ($search) {
                $query
                ->where(\DB::raw('lower(int_cod)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(name)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(price)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(stock_min)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(stock_max)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(status)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(photo)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(id_user_insert)') , "like", "%$search%")                
                ->orWhere(\DB::raw('lower(id_user_update)') , "like", "%$search%")                
                ;
            });
        }*/

        /* sort */
        $sort = $request->input("sort");
        /*$direction = $request->input("direction") == "desc" ? "desc" : "asc";
        if ($sort) {
            $query->orderBy($sort, $direction);
        }*/

        /* get paginated results */
        $movements = $query
            ->paginate(5)
            ->appends(request()->query());
            
        return response()->json([
            "rows" => $movements,
            "sort" => $request->query("sort"),
            "direction" => $request->query("direction"),
            "search" => $request->query("search")
        ]);
    }
    
    /**
     * Display the specified resource.
    */
    public function show(Movement $movement, Request $request): MovementResource | JsonResponse    
    {
       //return response()->json($movement);
        return new MovementResource($movement);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    //public function store(StoreArticleRequest $request): JsonResponse
    public function store(Request $request, string $typeId)
    {
        $dataMain = [
            'type_id' => $typeId,
            'number' => $request->main["number"],
            'date_time' => $request->main["date_time"],
            'subject' => $request->main["subject"],
            'description' => $request->main["description"],
            'observation' => $request->main["observation"],
            'support_type_id' => $request->main["support_type_id"],
            'support_number' => $request->main["support_number"],
            'support_date' => '2024-10-10T15:45:00.000Z', //$request->main["support_date"],
        ];

        $validator = Validator::make(
            data: $dataMain,
            rules: [
                'type_id' => [Rule::enum(MovementTypeId::class)],
                'number' => ['required', 'numeric'],
                'date_time' => ['required', 'date'],
                'subject' => ['required', 'string'],
                'support_type_id' => ['required', 'string'],
                'support_number' => ['required', 'string'],
                'support_date' => ['required', 'date'],
            ]
        );

        return ($validator->fails()) ? "true " : "false" ;

    }


}


