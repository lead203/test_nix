<?php

namespace App\Services;

class GroupManagementService
{
    public function getGroup(string $userName): int
    {
        return $userName[0] <= 'N' ? 1 : 2;
    }
}