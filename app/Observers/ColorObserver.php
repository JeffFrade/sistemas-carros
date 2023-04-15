<?php

namespace App\Observers;

use App\Exceptions\ColorAssignedException;
use App\Repositories\CarRepository;
use App\Repositories\Models\Color;

class ColorObserver
{
    public function deleting(Color $color)
    {
        $carRepository = new CarRepository();
        $cars = $carRepository->findBy('id_color', $color->id);

        if (count($cars) > 0) {
            throw new ColorAssignedException('Cor vinculada a um ou mais carros');
        }
    }
}
