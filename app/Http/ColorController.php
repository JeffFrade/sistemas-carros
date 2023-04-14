<?php

namespace App\Http;

use App\Core\Support\Controller;
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

    public function delete(int $id)
    {
        try {
            $this->colorService->delete($id);

            return response()->json([
                'message' => 'Cor Excluída com Sucesso'
            ]);
        } catch (ColorNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ], 500);
        }
    }
}
