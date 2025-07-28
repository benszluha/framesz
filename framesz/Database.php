<?php

namespace Szluha\Framesz;

use \PDO;

class Database {
    protected $connection;

    public function __construct($config, $username, $password) {
        $dsn = "mysql:" . http_build_query($config, "", ";");
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public static function query($sql, $params = []) {
        $statement = static::$connection->prepare($sql);
        $statement->execute($params);
        
        return $statement;
    }
}