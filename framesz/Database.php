<?php

namespace Szluha\Framesz;

require __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Yaml\Yaml;

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

    public static function createEntityManager() {
        $migrationsPath = __DIR__ . "/../Migrations";
        if (!file_exists($migrationsPath)) {
            mkdir($migrationsPath,0777, true);  
        }

        $config = new PhpFile(__DIR__ . "/../migrations.php");

        $paths = [__DIR__ . "/Entity"];
        $isDevMode = true;

        $ORMConfig = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

        $conn = Yaml::parseFile(__DIR__ . "/../config/db.yaml")['mariadb'];

        $connection = DriverManager::getConnection($conn);

        return new EntityManager($connection, $ORMConfig);
    }
}