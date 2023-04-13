<?php

namespace App\Repositories\Collections;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';

    protected $fillable = [
        'model',
        'id_brand',
        'id_color',
        'year',
        'price'
    ];

    public static function newFactory()
    {
        return CarFactory::new();
    }
}
