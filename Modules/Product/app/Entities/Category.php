<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_product';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\CategoryFactory::new();
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
      $sql = 'SELECT id, name, family, parent_id, level
                FROM view_categories {fld:where}
                  ORDER BY 3';
      switch ($request->type) { 
          case 'list': 
              $arr['where'] = '';           
              $params = [];
              break;
          case 'regist':
              $arr['where'] = 'WHERE id = :id';
              $params = ['id' => $request->value];
              break;
          case 'nivel':
              $arr['where'] = 'WHERE parent_id = :parent_id';
              $params = ['parent_id' => $request->value];
              break;
          case 'select': 
              $arr['where'] = "WHERE final = 't'";
              $params = [];
              break;
          case 'stock':
              if (!$request->value) 
                  $request->value = 0;                                
              $array = explode(",",$request->value);
              $arrPos = [];
              $arrBind = [];
              foreach ($array as $pos => $id) {
                  $arrPos[] = ":id_{$pos}";
                  $arrBind["id_{$pos}"] = $id; 
              }
              $arr['where'] = "WHERE id IN (SELECT category_id FROM public.products
                               WHERE id IN (SELECT product_id FROM public.presentations
                               WHERE id IN (" . implode(', ' , $arrPos) . ")))";
              $params = $arrBind;               
              break;
      }
      $sql = self::replaceData($arr, $sql);
      $return = DB::connection('pgsql_product')->select($sql, $params);
      return $request->type==="regist" ? json_encode($return[0]) : $return;
    }

    static public function regist($request)
    {    
        $categories = DB::connection('pgsql_product')->select('SELECT category_register( :id, :parent_id, :name )', [
          'id'        => $request->id,
          'parent_id' => $request->parent_id,
          'name'      => $request->name
        ]);
        return json_decode($categories[0]->category_register);
    }
    
    static public function remove($id)
    {
        $categories = DB::connection('pgsql_product')->select('SELECT public.category_remove(:id)', ['id' => $id]);
        return json_decode($categories[0]->category_remove);
    }

}
