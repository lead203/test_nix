<?php

namespace App\Services;

use App\Models\User;

class UsersService
{
    public function createUser(string $name, string $email): void
    {
        $userName = ucfirst(strtolower($name));

        $group = (new GroupManagementService)->getGroup($userName);

        User::create([
            'name'  => $userName,
            'email' => $email,
            'group' => $group,
        ]);
    }
}