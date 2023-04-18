<?php

namespace App\Observers;

use App\Exceptions\BrandAssignedException;
use App\Repositories\CarRepository;
use App\Repositories\Models\Brand;

class BrandObserver
{
    public function deleting(Brand $brand)
    {
        $carRepository = new CarRepository();
        $cars = $carRepository->findBy('id_brand', $brand->id);

        if (count($cars) > 0) {
            throw new BrandAssignedException('Marca vinculada a um ou mais carros.');
        }
    }
}
