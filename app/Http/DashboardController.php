<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\BrandService;
use App\Services\CarService;
use App\Services\ColorService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $colorService;
    private $brandService;
    private $carService;

    public function __construct(
        ColorService $colorService,
        BrandService $brandService,
        CarService $carService
    )
    {
        $this->colorService = $colorService;
        $this->brandService = $brandService;
        $this->carService = $carService;
    }

    public function index()
    {
        $totalColorsIndex = $this->colorService->totalColorsIndex();
        $totalBrandsIndex = $this->brandService->totalBrandsIndex();
        $totalCarsIndex = $this->carService->totalCarsIndex();
        $cars = $this->carService->getMostExpensiveCars();
        $totalShowcaseCars = $this->carService->totalShowcaseCars();
        $totalValue = $this->carService->totalValue();

        return view('dashboard', compact(
            'totalColorsIndex',
            'totalBrandsIndex',
            'totalCarsIndex',
            'cars',
            'totalShowcaseCars',
            'totalValue'
        ));
    }
}
