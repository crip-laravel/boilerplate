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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],
    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    /*'github' => [
        'client_id' => 'your-github-app-id',
        'client_secret' => 'your-github-app-secret',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],*/
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    /*'twitter' => [
        'client_id' => 'your-twitter-app-id',
        'client_secret' => 'your-twitter-app-secret',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    'linkedin' => [
        'client_id' => 'your-linkedin-app-id',
        'client_secret' => 'your-linkedin-app-secret',
        'redirect' => 'http://localhost:8000/auth/linkedin/callback',
    ],
    'google' => [
        'client_id' => 'your-google-app-id',
        'client_secret' => 'your-google-app-secret',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'bitbucket' => [
        'client_id' => 'your-bitbucket-app-id',
        'client_secret' => 'your-bitbucket-app-secret',
        'redirect' => 'http://localhost:8000/auth/bitbucket/callback',
    ],*/

];
