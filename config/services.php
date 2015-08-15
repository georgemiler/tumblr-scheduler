<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model' => 'App\User',
        'secret' => '',
    ],

    'tumblr' => [
        'client_id' => env('TUMBLR_TOKEN'),
        'client_secret' => env('TUMBLR_TOKEN_SECRET'),
        'redirect' => env('TUMBLR_REDIRECT_URI'),
    ]

];
