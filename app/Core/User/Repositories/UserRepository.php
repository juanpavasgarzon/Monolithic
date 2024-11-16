<?php

namespace App\Core\User\Repositories;

use App\Core\User\Models\User;

class UserRepository
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create(string $name, string $email, string $password): User
    {
        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        return $user;
    }
}
