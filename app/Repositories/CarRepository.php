<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Collections\Car;

class CarRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Car();
    }

    public function index(string $model = '', ?int $idBrand, ?int $idColor, ?int $year)
    {
        $cars = $this->model;

        if (!empty($model)) {
            $cars = $cars->where('model', 'LIKE', '%' . $model . '%');
        }

        if (!empty($idBrand)) {
            $cars = $cars->where('id_brand', $idBrand);
        }

        if (!empty($idColor)) {
            $cars = $cars->where('id_color', $idColor);
        }

        if (!empty($year)) {
            $cars = $cars->where('year', $year);
        }

        return $cars->with(['brand', 'color'])
            ->simplePaginate();
    }
}
