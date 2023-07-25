<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Presentation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $connection = 'pgsql_product';

    //protected $fillable = [];
    protected $fillable = ['measure_unit'];

    /**
     * Get the category for the product.
     */
    public function product()
    {        
        return $this->belongsTo(\Modules\Product\Entities\Product::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\PresentationFactory::new();
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
      $sql = "SELECT      
          A.id,
          A.product_id,
          A.sale_type,
          CASE WHEN A.sale_type=true THEN 'Mayor'
               WHEN A.sale_type=false THEN 'Detal'        
               END AS sale_type,         
          A.int_cod,
          A.bar_cod,      
          A.packing as packing_json,
          (select presentation_deploy(A.id)) as packing_deployment,
          A.price,          
          A.stock_min,
          A.stock_max,          
          CASE WHEN A.status=true THEN 'Activo'
              WHEN A.status=false THEN 'Inactivo'        
              END AS status,
          B.name,
          B.photo,
          C.name AS mark,
          D.name AS category
      FROM public.presentations A
      INNER JOIN public.products B ON A.product_id = B.id
      INNER JOIN public.marks C ON B.mark_id = C.id
      INNER JOIN public.categories D ON D.id = B.category_id
      {fld:where}
      ORDER BY 2;";

      switch ($request->type) {
          case 'id':
              $arr['where'] = 'WHERE A.id = :id'; 
              $params = ['id' => $request->value0];
              break;
          case 'ids':
              if (!$request->value0) 
                  $request->value0 = 0;
              $array = explode(",",$request->value0);
              $arrPos = [];
              $arrBind = [];
              foreach ($array as $pos => $id) {
                  $arrPos[] = ":id_{$pos}";
                  $arrBind["id_{$pos}"] = $id; 
              }
              $arr['where'] = "WHERE A.id IN (" . implode(', ' , $arrPos) . ") ";              
              $params = $arrBind;
              break;
          case 'product':                
              $arr['where'] = 'WHERE A.product_id = :product_id'; 
              $params = ['product_id' => $request->value0];
              break;
          case 'search':
              $arr['where'] = 'WHERE D.name LIKE UPPER(:arg) 
              OR B.name LIKE UPPER(:arg) 
              OR C.name  LIKE UPPER(:arg)
              OR bar_cod LIKE UPPER(:arg)
              OR int_cod LIKE UPPER(:arg)';
              $params = ['arg' => '%' . $request->value0 . '%'];
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
              $arr['where'] = "WHERE A.id IN (" . implode(', ' , $arrPos) . ")
                               AND A.product_id = :product_id";
              $arrBind["product_id"] = $request->value0;
              $params = $arrBind;               
              break;
          default:
              return;
      }
      
      $sql = self::replaceData($arr, $sql);      
      return DB::select($sql, $params);
      
    }

    static public function regist($request)
    {    
      $presentations = DB::select(
          "SELECT presentation_register( 
              :id_presentation, 
              :product_id,          
              :packing,
              :bar_cod,
              :int_cod,
              :stock_min,
              :stock_max,
              :price,
              :sale_type,
              :status,          
              :user_id)", [
                  'id_presentation' => $request->id_presentation,
                  'product_id'      => $request->product_id,              
                  'packing'         => $request->packing,
                  'bar_cod'         => $request->bar_cod,
                  'int_cod'         => $request->int_cod,              
                  'stock_min'       => $request->stock_min,
                  'stock_max'       => $request->stock_max,
                  'price'           => $request->price,
                  'sale_type'       => $request->sale_type,
                  'status'          => $request->status,              
                  'user_id'         => $request->user_id,
        ]);
        return $presentations[0]->presentation_register;
    }

    static public function remove($id)
    {
        $presentations = DB::select('SELECT public.presentation_remove(:id)', ['id' => $id]);
        return json_encode($presentations[0]->presentation_remove);
    }
}
