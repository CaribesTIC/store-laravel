<?php

namespace Modules\Common\Entities\MeasureUnit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Modules\Common\Entities\MeasureUnit\MuMeasureUnit;

class MuMeasureUnitType extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_common';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Common\Database\factories\MuMeasureUnitTypeFactory::new();
    }
}




