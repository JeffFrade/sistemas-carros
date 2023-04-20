<?php

namespace App\Services;

use App\Exceptions\BrandNotFoundException;
use App\Repositories\BrandRepository;

class BrandService
{
    private $brandRepository;

    public function __construct()
    {
        $this->brandRepository = new BrandRepository();
    }

    public function index(array $data)
    {
        $brand = $data['brand'] ?? '';

        return $this->brandRepository->index($brand);
    }

    public function store(array $data)
    {
        $this->brandRepository->create($data);
    }

    public function show(int $id)
    {
        $color = $this->brandRepository->findFirst('id', $id);

        if (empty($color)) {
            throw new BrandNotFoundException('Marca Inexistente');
        }

        return $color;
    }

    public function update(array $data, int $id)
    {
        $this->show($id);

        $this->brandRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->show($id);
        $this->brandRepository->delete($id);
    }

    public function totalBrandsIndex()
    {
        return count($this->getAll());
    }

    public function getAll()
    {
        return $this->brandRepository->allNoTrashed();
    }
}
