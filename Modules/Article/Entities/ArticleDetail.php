<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    use HasFactory, SoftDeletes;

    //protected $connection = 'pgsql_article';

    protected $fillable = [
        'id',     
        'article_id',     
        'presentation_id',     
        'quantity',     
        'status',     
        'user_insert_id',     
        'user_update_id',      
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
        
    public function article()
    {
        return $this->belongsTo(\Modules\Article\Entities\Article::class);
    }  

    protected static function newFactory()
    {
        return \Modules\Article\Database\Factories\ArticleDetailFactory::new();
    }
}
