<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\ColorService;

class ColorController extends Controller
{
    private $colorService;

    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index()
    {
        $colors = $this->colorService->index();

        return view('color.index', compact('colors'));
    }
}
