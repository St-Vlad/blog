<?php

namespace App\Core\Db;

use PDO;

abstract class DBConnection
{
    private static $config = [
        'host_name' => 'localhost',
        'db_name' => 'blog',
        'db_root' => 'root',
        'db_pass' => ''
    ];

    protected static $pdoConnection = null;

    protected function getDb() {
         if (self::$pdoConnection === null) {
            self::$pdoConnection = self::createPdoConnection();
         }
    return self::$pdoConnection;
    }

    protected static function createPdoConnection() {
        $dsn = "mysql:host=" .self::$config['host_name']. "; dbname=" .self::$config['db_name'];
        return new PDO($dsn, self::$config['db_root'], self::$config['db_pass'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}