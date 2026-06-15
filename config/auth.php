<?php

return [

    /*Pengaturan Default (Authentication)*/
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*Pengaturan Guard (Authentication)*/
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*Pengaturan User Provider (Authentication)*/
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*Pengaturan Reset Token (Authentication)*/
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*Pengaturan Timeout Konfirmasi Password (Authentication)*/
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
