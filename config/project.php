<?php

use App\Utilities\Constance;

return [

    /*
    |--------------------------------------------------------------------------
    | Active Api version
    |--------------------------------------------------------------------------
    |
    | This option controls the active working API version.
    |
    */
    'active-api-version' => env('ACTIVE_API_VERSION', 'v1'),

    /*
    |--------------------------------------------------------------------------
    | Datetime Format
    |--------------------------------------------------------------------------
    |
    | This option format datetime for timestamps in models ex: created_at,
    | updated_at.
    |
    */
    'datetime-format' => env('DATETIME_FORMANT', 'Y-m-d H:i:s'),


    /*
    |--------------------------------------------------------------------------
    | Store meta
    |--------------------------------------------------------------------------
    |
    | This is the information of your store.
    |
    */
    'store-name' => env('STORE_NAME', 'Open Sale'),
    'store-description' => env('STORE_DESCRIPTION', 'This is an open source e-commerce project built with laravel and flutter.'),
    'store-logo' => env('STORE_LOGO', env('APP_URL') . '/uploads/open-sale.jpg'),
    'store-address' => env('STORE_ADDRESS', 'Yemen'),
];
