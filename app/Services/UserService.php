<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
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
