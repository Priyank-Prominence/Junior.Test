<?php

namespace App\Utils;

class Database
{
    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = new \PDO("mysql:host=localhost;dbname=id20486118_product_db", "id20486118_root", 'priyankParso01.');
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }
}


