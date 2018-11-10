<?php

return [
    'settings' => [
        'displayErrorDetails' => env('DISPLAY_ERROR_DETAILS', false),
        'db' => [
            'default'  => env('DB_CONNECTION', 'mysql'),
            'mysql' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE', 'test-takers'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ],
            'json' => [
                'path' => env('JSON_DATA_FILE_PATH', __DIR__ . '/../database/testtakers.json'),
            ],
            'csv' => [
                'path' => env('CSV_DATA_FILE_PATH', __DIR__ . '/../database/testtakers.json'),
            ],
        ],
    ],
];