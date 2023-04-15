<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\ColorAssignedException;
use App\Exceptions\ColorNotFoundException;
use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $colorService;

    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index(Request $request)
    {
        $params = $request->all();

        $colors = $this->colorService->index($params);

        return view('color.index', compact('colors', 'params'));
    }

    public function create()
    {
        return view('color.create');
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);

        $this->colorService->store($params);

        return redirect(route('dashboard.colors.index'))
            ->with('message', 'Cor cadastrada com sucesso!');
    }

    public function delete(int $id)
    {
        try {
            $this->colorService->delete($id);

            return response()->json([
                'message' => 'Cor Excluída com Sucesso'
            ]);
        } catch (ColorNotFoundException | ColorAssignedException $e) {
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
            'color' => 'required|max:15'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
