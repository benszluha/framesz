<?php

require __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Yaml\Yaml;

$config = new PhpFile(__DIR__ . "/../migrations.php");

$paths = [__DIR__ . "/../framesz/Entity"];
$isDevMode = true;

$ORMConfig = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

$conn = Yaml::parseFile(__DIR__ . "/db.yaml")['mariadb'];
//$conn = ['driver' => 'pdo_sqlite', 'memory' => true];
$connection = DriverManager::getConnection($conn);

$entityManager =  new EntityManager($connection, $ORMConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));