<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Color;

class ColorRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Color();
    }
}
