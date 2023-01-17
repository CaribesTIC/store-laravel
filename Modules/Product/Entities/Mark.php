<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mark extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_product';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\MarkFactory::new();
    }
}
