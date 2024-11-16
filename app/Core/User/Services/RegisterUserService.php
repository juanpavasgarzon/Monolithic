<?php

namespace App\Core\User\Services;

use App\Core\User\Models\User;
use App\Core\User\Repositories\UserRepository;

class RegisterUserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function handle(string $name, string $email, string $password): User
    {
        return $this->repository->create($name, $email, $password);
    }
}
