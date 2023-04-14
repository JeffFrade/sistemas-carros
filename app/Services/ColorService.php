<?php

namespace App\Services;
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
}
