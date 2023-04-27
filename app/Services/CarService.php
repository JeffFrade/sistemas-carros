<?php

namespace App\Services;
use App\Exceptions\CarNotFoundException;
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

    public function show(string $id)
    {
        $car = $this->carRepository->findFirst('_id', $id);

        if (empty($car)) {
            throw new CarNotFoundException('Carro Inexistente');
        }

        return $car;
    }

    public function delete(string $id)
    {
        $this->show($id);
        $this->carRepository->delete($id);
    }

    public function getMostExpensiveCars()
    {
        return $this->carRepository->getMostExpensiveCars();
    }

    public function totalShowcaseCars()
    {
        return $this->carRepository->totalShowcaseCars();
    }

    public function totalValue()
    {
        return $this->carRepository->totalValue();
    }

    public function avgPrice()
    {
        return $this->carRepository->avgPrice();
    }
}
