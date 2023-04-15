<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\ColorService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $colorService;

    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index()
    {
        $totalColorsIndex = $this->colorService->totalColorsIndex();

        return view('dashboard', compact('totalColorsIndex'));
    }
}
