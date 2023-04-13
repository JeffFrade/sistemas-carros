<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Brand;

class BrandRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Brand();
    }
}
