<?php

namespace App\Controllers;

use App\Exceptions\ValidationException;
use App\Models\User;
use App\Services\GroupManagementService;
use App\Services\UsersService;
use App\Services\ValidationService;

class UsersController
{
    public function index(array $request)
    {
        $users = User::select();

        include __DIR__ . '/../../resources/views/users.php';
    }

    public function get(array $request)
    {
        $userId = $request['id'];
        $user = User::get($userId);

        header('Content-type: application/json');
        echo json_encode($user);
    }

    public function create(array $request)
    {
        try {
            $name = $request['name'];
            $email = $request['email'];

            $validator = new ValidationService();

            if ($validator->validateUser($name, $email)) {
                $service = new UsersService();
                $service->createUser($name, $email);

                header('Location: /users');
            }
        } catch (ValidationException $exception) {
            http_response_code(422);
            echo $exception->getMessage();
        }
    }
}
