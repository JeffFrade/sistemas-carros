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

    public function index()
    {
        return $this->colorRepository->allNoTrashed();
    }
}
