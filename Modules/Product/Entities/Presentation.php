<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentation extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_product';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\PresentationFactory::new();
    }
}
