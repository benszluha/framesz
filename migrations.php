<?php

return [
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => '191',
        'executed_at_column_name' => 'executed_at',
        'execution_time_column_name' => 'executed_time',
    ],

    'migrations_paths' => [
        'Szluhab\Migrations' => __DIR__ . "/Migrations"

    ],
    
    'all_or_nothing' => true,
    'transactional' => true,
    'check_database_platform' => true,
    'organize_migrations' => 'none',
    'connection' => null,
    'em' => null,
];