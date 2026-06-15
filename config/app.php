<?php

return [

    /*Membuat Nama Aplikasi*/
    'name' => env('APP_NAME', 'Laravel'),

    /*Mode Aplikasi*/
    'env' => env('APP_ENV', 'production'),

    /*Mode Debug Aplikasi*/

    'debug' => (bool) env('APP_DEBUG', false),

    /*URL Lokal Aplikasi*/
    'url' => env('APP_URL', 'http://localhost'),

    /*Pengaturan Zona Waktu*/
    'timezone' => 'UTC',

    /*Pengaturan Lokal Aplikasi*/
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*Pengaturan Kunci Ter-Enkripsi*/
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*Pengaturan Mode-Pemeliharaan(Maintenance)*/
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
