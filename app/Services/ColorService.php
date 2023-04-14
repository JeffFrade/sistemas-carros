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

    public function delete(int $id)
    {
        $this->show($id);
        $this->colorRepository->delete($id);
    }

    private function show(int $id)
    {
        $color = $this->colorRepository->findFirst('id', $id);

        if (empty($color)) {
            throw new ColorNotFoundException('Cor Inexistente');
        }

        return $color;
    }
}
