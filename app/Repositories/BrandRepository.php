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

    public function index(string $brand = '')
    {
        return $this->model->where('brand', 'LIKE', '%' . $brand . '%')
            ->simplePaginate();
    }
}
