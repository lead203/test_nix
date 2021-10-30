<?php

namespace App\Helper;

use ParagonIE\EasyDB\Factory;

class DB
{
    private static $db;

    public static function connection()
    {
        $connection = getenv('DB_CONNECTION');
        $host = getenv('DB_HOST');
        $database = getenv('DB_DATABASE');
        $user = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        if (!self::$db) {
            self::$db = Factory::fromArray([
                sprintf('%s:host=%s;dbname=%s', $connection, $host, $database),
                $user,
                $password
            ]);
        }

        return self::$db;
    }
}

