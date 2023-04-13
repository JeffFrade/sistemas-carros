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
}
