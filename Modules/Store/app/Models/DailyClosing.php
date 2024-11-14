<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Modules\Store\Database\Factories\DailyClosingFactory;

class DailyClosing extends Model
{
    use HasFactory;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): DailyClosingFactory
    // {
    //     // return DailyClosingFactory::new();
    // }
}
