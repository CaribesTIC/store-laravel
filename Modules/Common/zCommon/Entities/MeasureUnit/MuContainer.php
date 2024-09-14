<?php

namespace Modules\Common\Entities\MeasureUnit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MuContainer extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_common';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Common\Database\factories\MuContainerFactory::new();
    }
}
