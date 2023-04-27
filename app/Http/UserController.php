<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\UserNotFoundException;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $params = $request->all();

        $users = $this->userService->index($params);

        return view('user.index', compact('users', 'params'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        /*$params = $this->toValidate($request);

        $this->userService->store($params);

        return redirect(route('dashboard.users.index'))
            ->with('message', 'Usuário cadastrado com sucesso!');*/
    }

    public function edit(int $id)
    {
        /*$user = $this->userService->show($id);

        return view('user.edit', compact('user'));*/
    }

    public function update(Request $request, int $id)
    {
        /*try {
            $params = $this->toValidate($request);

            $this->userService->update($params, $id);

            return redirect(route('dashboard.users.index'))
                ->with('message', 'Usuário editado com sucesso!');
        } catch (UserNotFoundException $e) {
            return redirect(route('dashboard.users.index'))
                ->with('error', $e->getMessage());
        }*/
    }

    public function delete(int $id)
    {
        /*try {
            $this->userService->delete($id);

            return response()->json([
                'message' => 'Usuário Excluído com Sucesso'
            ]);
        } catch (UserNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ], 500);
        }*/
    }

    protected function toValidate(Request $request)
    {
        $toValidateArr = [
            'color' => 'required|max:15'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
