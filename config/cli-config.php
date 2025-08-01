<?php

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Szluha\Framesz\Database;

$config = new PhpFile(__DIR__ . "/../migrations.php");
$entityManager = Database::createEntityManager();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));