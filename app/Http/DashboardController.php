<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\BrandService;
use App\Services\ColorService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $colorService;
    private $brandService;

    public function __construct(ColorService $colorService, BrandService $brandService)
    {
        $this->colorService = $colorService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $totalColorsIndex = $this->colorService->totalColorsIndex();
        $totalBrandsIndex = $this->brandService->totalBrandsIndex();

        return view('dashboard', compact('totalColorsIndex', 'totalBrandsIndex'));
    }
}
