<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_product';

    protected $fillable = [
        'company_id',
        'name',
        'category_id',
        'mark_id',
        'measure_unit_type_id',
        'measure_unit_id'      
        //'photo'
    ];

   protected $load = ['category', 'mark'];
  // protected $with = ['category', 'mark'];   

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }    
    
    /**
     * Get the category for the product.
     */
    public function category()
    {        
        return $this->belongsTo(\Modules\Product\Entities\Category::class);
    }

    /**
     * Get the mark for the product.
     */
    public function mark()
    {        
        return $this->belongsTo(\Modules\Product\Entities\Mark::class);
    }

    public function presentations()
    {        
        return $this->hasMany(\Modules\Product\Entities\Presentation::class);
    }


    private static function replaceData($request, $string)
    {
        if (!empty($string) && !empty($request)) {
            foreach ($request as $campo => $valor) {
                $fields = "{fld:" . $campo . "}";
                $string = str_replace($fields, $valor, $string);
            }
        }
        return $string;
    }

    static public function get($request)
    {
      $arr = [];
      $sql = 'SELECT 
                  A.id
                 ,A.name
                 ,A.mark_id
                 ,A.category_id
                 ,A.measure_unit_type_id
                 ,A.measure_unit_id
                 ,A.measure_unit
                 //,A.photo
                 ,B.name AS des_category
                 ,B.family AS des_category_family
                 ,C.name AS des_mark
             FROM public.products A
                 INNER JOIN public.view_categories B ON A.category_id=B.id
                 INNER JOIN public.marks C ON A.mark_id=C.id
             {fld:where}
             ORDER BY 2;';
      switch ($request->type) { 
          case 'list': 
              $arr['where'] = '';           
              $params = [];
              break;
          case 'category':          
                $arr['where'] = 'WHERE A.category_id = :category_id';           
                $params = ['category_id' => $request->value0];
                break;
          case 'regist':
              $arr['where'] = 'WHERE A.id = :id';
              $params = ['id' => $request->value0];
              break;
           case 'stock':
              if (!$request->value0) 
                  $request->value0 = 0;
              if (!$request->value1) 
                  $request->value1 = 0;
              $array = explode(",",$request->value1);
              $arrPos = [];
              $arrBind = [];
              foreach ($array as $pos => $id) {
                  $arrPos[] = ":id_{$pos}";
                  $arrBind["id_{$pos}"] = $id; 
              }
              $arr['where'] = "WHERE A.id IN (SELECT product_id FROM public.presentations
                               WHERE id IN (" . implode(', ' , $arrPos) . "))
                               AND A.category_id = :category_id";
              $arrBind["category_id"] = $request->value0;
              $params = $arrBind;               
              break;
          default:
              return;
      }
      $sql = self::replaceData($arr, $sql);
      $return = DB::select($sql, $params);
      return $request->type==="regist" ? json_encode($return[0]) : $return;
    }

    static public function regist($request)
    {    
        $products = DB::select(
          "SELECT product_register( :id, :name, :category_id, :mark_id, :measure_unit_type_id, :measure_unit_id, :measure_unit, :user_id )", [
          'id'                   => $request->id,
          'name'                 => $request->name,
          'category_id'          => $request->category_id,
          'mark_id'              => $request->mark_id,
          'measure_unit_type_id' => $request->measure_unit_type_id,
          'measure_unit_id'      => $request->measure_unit_id,
          'measure_unit'         => $request->measure_unit,
          'user_id'              => $request->user_id
        ]);
        return $products[0]->product_register;
    }
}
