<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\BrandService;
use App\Services\CarService;
use App\Services\ColorService;
use App\Services\UserService;

class DashboardController extends Controller
{
    private $colorService;
    private $brandService;
    private $carService;
    private $userService;

    public function __construct(
        ColorService $colorService,
        BrandService $brandService,
        CarService $carService,
        UserService $userService
    )
    {
        $this->colorService = $colorService;
        $this->brandService = $brandService;
        $this->carService = $carService;
        $this->userService = $userService;
    }

    public function index()
    {
        $totalColorsIndex = $this->colorService->totalColorsIndex();
        $totalBrandsIndex = $this->brandService->totalBrandsIndex();
        $totalCarsIndex = $this->carService->totalCarsIndex();
        $cars = $this->carService->getMostExpensiveCars();
        $totalShowcaseCars = $this->carService->totalShowcaseCars();
        $totalValue = $this->carService->totalValue();
        $avgPrice = $this->carService->avgPrice();
        $totalUsers = $this->userService->totalUsersIndex();

        return view('dashboard', compact(
            'totalColorsIndex',
            'totalBrandsIndex',
            'totalCarsIndex',
            'cars',
            'totalShowcaseCars',
            'totalValue',
            'avgPrice',
            'totalUsers'
        ));
    }
}
