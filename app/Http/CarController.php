<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\CarNotFoundException;
use App\Services\BrandService;
use App\Services\CarService;
use App\Services\ColorService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $carService;
    private $brandService;
    private $colorService;

    public function __construct(
        CarService $carService,
        BrandService $brandService,
        ColorService $colorService
    )
    {
        $this->carService = $carService;
        $this->brandService = $brandService;
        $this->colorService = $colorService;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $brands = $this->brandService->getAll();
        $colors = $this->colorService->getAll();
        $cars = $this->carService->index($params);

        return view('car.index', compact('params', 'brands', 'colors', 'cars'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {

    }

    public function delete(string $id)
    {
        try {
            $this->carService->delete($id);

            return response()->json([
                'message' => 'Carro Excluído com Sucesso'
            ]);
        } catch (CarNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ], 500);
        }
    }

    protected function toValidate(Request $request)
    {
        $toValidateArr = [
            'brand' => 'required|max:30'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
