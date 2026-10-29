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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],

'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_REDIRECT_URI'),
],

'twitter' => [
    'client_id' => env('TWITTER_CLIENT_ID'),
    'client_secret' => env('TWITTER_CLIENT_SECRET'),
    'redirect' => env('TWITTER_REDIRECT_URI'),
],
'razorpay' => [
    'key' => env('RAZORPAY_KEY_ID'),
    'secret' => env('RAZORPAY_KEY_SECRET'),
    'webhook_secret'=> env('RAZORPAY_WEBHOOK_SECRET')
],

'payu' => [
    'key' => env('PAYU_KEY'),
    'salt' => env('PAYU_SALT'),
    'base_url' => env('PAYU_BASE_URL'),
],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
