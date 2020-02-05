<?php
$configs = [
    'local' => [
        'settings' => [
            'displayErrorDetails' => true,

            'database' => [
                'connection_string' => 'mysql:host=localhost;dbname=dbname;charset=utf8mb4',
                'username' => 'dbuser',
                'password' => 'dbpass'
            ],

            'logger' => [
                'name' => 'app',
                'path' => APP_ROOT . '/logs/app.log',
                'level' => Monolog\Logger::DEBUG
            ],

            'version' => '0.0.1'
        ]
    ],
    'staging' => [
        'settings' => [
            'displayErrorDetails' => false,

            'database' => [
                'connection_string' => 'mysql:host=localhost;dbname=dbname;charset=utf8mb4',
                'username' => 'dbuser',
                'password' => 'dbpass'
            ],

            'logger' => [
                'name' => 'app',
                'path' => APP_ROOT . '/logs/app.log',
                'level' => Monolog\Logger::DEBUG
            ],

            'version' => '0.0.1'
        ]
    ]
];