<?php

namespace App\Models;

use App\Helper\DB;

class User
{
    public static function select(): array
    {
        return DB::connection()->run('SELECT * FROM users ORDER BY id');
    }

    public static function create(array $params)
    {
        DB::connection()->insert('users', [
            'name'  => $params['name'],
            'email' => $params['email'],
            'group' => $params['group'],
        ]);
    }

    public static function get(int $id): ?array
    {
        return DB::connection()->row(
            "SELECT * FROM users WHERE id = ?",
            $id
        );
    }
}