<?php

namespace App\Services;

use App\Exceptions\ValidationException;

class ValidationService
{
    public function validateUser(string $name, string $email): bool
    {
        if (!$this->validateUserName($name)) {
            throw new ValidationException('Error in user name');
        }

        if (!$this->validateEmail($email)) {
            throw new ValidationException('Invalid email format');
        }

        return true;
    }

    public function validateUserName($name): bool
    {
        return (bool)preg_match('/^[a-zA-Z]+$/', $name);
    }

    public function validateEmail($email): bool
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}