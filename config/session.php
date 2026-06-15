<?php

use Illuminate\Support\Str;

return [


    /*Pengaturan Default (Session)*/
    'driver' => env('SESSION_DRIVER', 'database'),

    /*Pengaturan Lifetime (Session)*/
    'lifetime' => (int) env('SESSION_LIFETIME', 120),
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*Pengaturan Encrypt (Session)*/
    'encrypt' => env('SESSION_ENCRYPT', false),

    /*Pengaturan File (Session)*/
    'files' => storage_path('framework/sessions'),

    /*Pengaturan Connection (Session)*/
    'connection' => env('SESSION_CONNECTION'),

    /*Pengaturan Table (Session)*/  
    'table' => env('SESSION_TABLE', 'sessions'),

    /*Pengaturan Store (Session)*/
    'store' => env('SESSION_STORE'),

    /*Pengaturan Lottery (Session)*/
    'lottery' => [2, 100],

    /*Pengaturan Cookie (Session)*/
    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'),

    /*Pengaturan Path (Session)*/
    'path' => env('SESSION_PATH', '/'),

    /*Pengaturan Domain (Session)*/
    'domain' => env('SESSION_DOMAIN'),

    /*Pengaturan Secure (Session)*/
    'secure' => env('SESSION_SECURE_COOKIE'),

    /*Pengaturan HTTP Only (Session)*/
    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*Pengaturan Same Site (Session)*/
    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*Pengaturan Partitioned (Session)*/
    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
