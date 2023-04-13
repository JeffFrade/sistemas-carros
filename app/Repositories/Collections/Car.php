<?php

namespace App\Repositories\Collections;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';

    protected $fillable = [
        'model',
        'id_brand',
        'id_color',
        'year',
        'price'
    ];
}
