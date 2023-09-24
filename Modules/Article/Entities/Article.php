<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Database\Factories\ArticleFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    //protected $connection = 'pgsql_article';

    protected $fillable = [
        'id',     
        'int_cod',     
        'name',     
        'price',     
        'stock_min',     
        'stock_max',     
        'status',     
        'photo',     
        'id_user_insert',     
        'id_user_update'     
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
    
        
    public function articleDetails()
    {        
        return $this->hasMany(\Modules\Article\Entities\ArticleDetail::class);
    }
    
    protected static function newFactory()
    {
        return ArticleFactory::new();
    }
}
