<?php

namespace app\Config;

class Database
{
    private static ?\PDO $pdo = null;
    public static function getConnection(string $env = "test"): \PDO{
        if(self::$pdo == null){
            // create new PDO
            require_once __DIR__ . '/../../config/database.php';
            $config = DatabaseConfig();
            self::$pdo = new \PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password']
            );
        }

        return self::$pdo;
    }
}