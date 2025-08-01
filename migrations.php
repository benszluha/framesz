<?php

return [
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => 191,
        'executed_at_column_name' => 'executed_at',
    ],
    'migrations_paths' => [
        'App\\Migrations' => __DIR__ . '/migrations', // Namespace and path to your migrations
    ],
    'all_or_nothing' => true, // Ensure all migrations in a batch are within a single transaction
    'transactional' => true, // Wrap each individual migration in a transaction
    'check_database_platform' => true,
    'organize_migrations' => 'year_and_month', // Organize migrations into year/month subdirectories
    'connection' => null, // Managed by cli-config.php
    'em' => null,         // Managed by cli-config.php
];