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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google_map' => [
        // 'client_id' => '82408598368-u03lredmuhjcil8d1su3ubo6qdsldck4.apps.googleusercontent.com',
        'client_id' => 'AIzaSyBdsjb_RUMEkFt5eBE1iyaHrY-FVEiyMSI&libraries=places',
        'client_secret' => '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',
        // 'redirect' => 'http://localhost:8000/google/address',
    ],
];
