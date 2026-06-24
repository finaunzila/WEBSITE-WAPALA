<?php

use Monolog\Handler\StreamHandler;
use Monolog\Handler\NullHandler;

return [
    'default' => env('LOG_CHANNEL', 'stderr'),

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['stderr'],
            'ignore_exceptions' => false,
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => 'debug',
            'handler' => StreamHandler::class,
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'single' => [
            'driver' => 'null', // Mematikan penulisan file
        ],

        'daily' => [
            'driver' => 'null', // Mematikan penulisan file
        ],
    ],
];