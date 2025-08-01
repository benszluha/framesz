<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Tools\Console\Command;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

require_once __DIR__ . "/../vendor/autoload.php";

// DB config load
$dbParams = Yaml::parseFile(__DIR__ . "/db.yaml");

// Entity paths
$paths = [__DIR__ . "/../framesz/Entity"];
$isDevMode = true; // Set to false in production

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// DB connection params
$conn = [
    'driver' => $dbParams['driver'],
    'host' => $dbParams['host'],
    'dbname' => $dbParams['dbname'],
    'user' => $dbParams['user'],
    'pasword' => $dbParams['password'],
    'charset' => 'utf8mb4',   
    
];

// Obtain an entity manager
$entityManager = EntityManager::create($conn, $config);

// --- Migragtons Configuration --- //
$migrationsConfig = new PhpFile(__DIR__ . '/../migratoins.php'); // The path to the migrations config file

$dependancyFactory = DependencyFactory::fromEntityManager(
    $migrationsConfig,
    new ExistingEntityManager($entityManager);
);

// Create console application
$app = new Application('Doctrine CLI');

// Add ORM commands
$app->setHelperSet(new HelperSet([
    'em' => new EntityManagerHelper($entityManager)
]));
ConsoleRunner::addCommands($app);

// Add migration commands
$app->addCommands([
    new Command\DumpSchemaCommand($dependencyFactory),
    new Command\ExecuteCommand($dependencyFactory),
    new Command\GenerateCommand($dependencyFactory),
    new Command\LatestCommand($dependencyFactory),
    new Command\MigrateCommand($dependencyFactory),
    new Command\RollupCommand($dependencyFactory),
    new Command\StatusCommand($dependencyFactory),
    new Command\VersionCommand($dependencyFactory),
    new Command\UpToDateCommand($dependencyFactory),
    new Command\SyncMetadataCommand($dependencyFactory),
    new Command\DiffCommand($dependencyFactory), // Crucial for auto-generation
]);

// Return the application for the console
return $app;