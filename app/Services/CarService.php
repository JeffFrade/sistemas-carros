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
}
