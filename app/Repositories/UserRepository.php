<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\User;

class UserRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function index(string $search)
    {
        return $this->model->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->simplePaginate();
    }
}
