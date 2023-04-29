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

    public function getMostExpensiveCars()
    {
        return $this->model->orderBy('price', 'DESC')
            ->limit(10)
            ->get();
    }

    public function totalShowcaseCars()
    {
        return $this->model->where('showcase', 1)
            ->count();
    }

    public function totalValue()
    {
        return $this->model->sum('price');
    }

    public function avgPrice()
    {
        return $this->model->avg('price');
    }
}
