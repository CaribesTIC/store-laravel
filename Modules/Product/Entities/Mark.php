<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Mark extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_product';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\MarkFactory::new();
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
      $sql = 'SELECT id, name, producer_id 
                FROM public.marks {fld:where} ORDER BY 2;';
      switch ($request->type) { 
          case 'list': 
              $arr['where'] = '';           
              $params = [];
              break;
          case 'regist':
              $arr['where'] = 'WHERE id = :id';
              $params = ['id' => $request->value];
              break;
      }
      $sql = self::replaceData($arr, $sql);
      $return = DB::select($sql, $params);
      return $request->type==="regist" ? json_encode($return[0]) : $return;
    }

    static public function regist($request)
    {    
        $marks = DB::select('SELECT mark_register( :id, :name, :producer_id )', [
          'id'        => $request->id,
          'name'      => $request->name,
          'producer_id' => $request->producer_id,
        ]);
        return json_decode($marks[0]->mark_register);
    }
    
    static public function remove($id)
    {
        $marks = DB::select('SELECT public.mark_remove(:id)', ['id' => $id]);
        return json_decode($marks[0]->mark_remove);
    }

}
