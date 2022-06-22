<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'ghn' => [
        'base_uri' => env('GIAO_HANG_NHAN_BASE_URI'),
        'shop_id' => env('GIAO_HANG_NHANH_SHOPID'),
        'from_district_id' => env('GIAO_HANG_NHANH_FROM_DISTRICT_ID'),
        'token' => env('GIAO_HANG_NHANH_TOKEN'),
    ],
    'vnpay' => [
        'tmncode' => env('VNPAY_TMNCODE'),
        'hashsecret' => env('VNPAY_HASHSECRET')
    ]
];
