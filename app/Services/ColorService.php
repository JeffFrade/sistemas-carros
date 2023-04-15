<?php

namespace App\Services;
use App\Exceptions\ColorNotFoundException;
use App\Repositories\ColorRepository;

class ColorService
{
    private $colorRepository;

    public function __construct()
    {
        $this->colorRepository = new ColorRepository();
    }

    public function index(array $data)
    {
        $color = $data['color'] ?? '';

        return $this->colorRepository->index($color);
    }

    public function store(array $data)
    {
        $this->colorRepository->create($data);
    }

    public function show(int $id)
    {
        $color = $this->colorRepository->findFirst('id', $id);

        if (empty($color)) {
            throw new ColorNotFoundException('Cor Inexistente');
        }

        return $color;
    }

    public function update(array $data, int $id)
    {
        $this->show($id);

        $this->colorRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->show($id);
        $this->colorRepository->delete($id);
    }

    public function totalColorsIndex()
    {
        return count($this->colorRepository->allNoTrashed());
    }
}
