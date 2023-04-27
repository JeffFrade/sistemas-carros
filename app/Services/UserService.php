<?php

namespace App\Services;

use App\Exceptions\UserNotFoundException;
use App\Helpers\StringHelper;
use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index(array $data)
    {
        return $this->userRepository->index($data['search'] ?? '');
    }

    public function store(array $data)
    {
        $data['password'] = StringHelper::hashPassword($data['password']);
        $this->userRepository->create($data);
    }

    public function show(int $id)
    {
        $user = $this->userRepository->findFirst('id', $id);

        if (empty($user)) {
            throw new UserNotFoundException('Usuário Inexistente');
        }

        return $user;
    }

    public function update(array $data, int $id)
    {
        $this->show($id);

        $data['password'] = StringHelper::hashPassword($data['password']);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $this->userRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->show($id);
        $this->userRepository->delete($id);
    }

    public function totalUsersIndex()
    {
        return count($this->getAll());
    }

    public function getAll()
    {
        return $this->userRepository->allNoTrashed();
    }
}
