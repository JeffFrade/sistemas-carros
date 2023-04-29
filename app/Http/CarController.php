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
        $brands = $this->brandService->getAll();
        $colors = $this->colorService->getAll();

        return view('car.create', compact('brands', 'colors'));
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);
        $this->carService->store($params);

        return redirect(route('dashboard.cars.index'))
            ->with('message', 'Carro cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $brands = $this->brandService->getAll();
        $colors = $this->colorService->getAll();
        $car = $this->carService->show($id);

        return view('car.edit', compact('car', 'colors', 'brands'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $params = $this->toValidate($request);
            $this->carService->update($params, $id);

            return redirect(route('dashboard.cars.index'))
                ->with('message', 'Carro editado com sucesso!');
        } catch (CarNotFoundException $e) {
            return redirect(route('dashboard.cars.index'))
                ->with('error', $e->getMessage());
        }
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
            'model' => 'required|max:50',
            'id_brand' => 'required|numeric',
            'id_color' => 'required|numeric',
            'year' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'showcase' => 'required|numeric',
        ];

        return $this->validate($request, $toValidateArr);
    }
}
