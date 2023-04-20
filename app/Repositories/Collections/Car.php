<?php

namespace App\Repositories\Collections;

use App\Repositories\Models\Brand;
use App\Repositories\Models\Color;
use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, HybridRelations, SoftDeletes;

    protected $connection = 'mongodb';

    protected $fillable = [
        'model',
        'id_brand',
        'id_color',
        'year',
        'price',
        'showcase',
        'image'
    ];

    protected $casts = [
        'showcase' => 'boolean'
    ];

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'id_brand');
    }

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'id_color');
    }

    public static function newFactory()
    {
        return CarFactory::new();
    }
}
