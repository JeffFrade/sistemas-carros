<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\BrandAssignedException;
use App\Exceptions\BrandNotFoundException;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $brands = $this->brandService->index($params);

        return view('brand.index', compact('brands', 'params'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);

        $this->brandService->store($params);

        return redirect(route('dashboard.brands.index'))
            ->with('message', 'Marca cadastrada com sucesso!');
    }

    public function edit(int $id)
    {
        $brand = $this->brandService->show($id);

        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, int $id)
    {
        try {
            $params = $this->toValidate($request);

            $this->brandService->update($params, $id);

            return redirect(route('dashboard.brands.index'))
                ->with('message', 'Marca editada com sucesso!');
        } catch (BrandNotFoundException $e) {
            return redirect(route('dashboard.brands.index'))
                ->with('error', $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $this->brandService->delete($id);

            return response()->json([
                'message' => 'Marca Excluída com Sucesso'
            ]);
        } catch (BrandNotFoundException | BrandAssignedException $e) {
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
