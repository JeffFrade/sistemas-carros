<?php

namespace App\Services;
use App\Repositories\CarRepository;

class CarService
{
    private $carRepository;

    public function __construct()
    {
        $this->carRepository = new CarRepository();
    }

    public function totalCarsIndex()
    {
        return count($this->carRepository->allNoTrashed());
    }

    public function index(array $data)
    {
        $model = $data['model'] ?? '';
        $idBrand = $data['id_brand'] ?? null;
        $idColor = $data['id_color'] ?? null;
        $year = $data['year'] ?? null;

        return $this->carRepository->index($model, $idBrand, $idColor, $year);
    }
}
