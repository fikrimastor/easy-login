<?php

return [
    /**
     * Define the GitHub OAuth credentials
     */
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT_URL'),
    ],

    /**
     * Define the Google OAuth credentials
     */
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],

    /**
     * Define the Facebook OAuth credentials
     */
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI'),
    ],

    /**
     * Define the Twitter @ X OAuth credentials
     */
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_REDIRECT_URI'),
    ],

    /**
     * Define the default redirect paths
     */
    'redirects' => [
        'success' => '/dashboard',
        'failure' => '/login'
    ],

    /**
     * Define the success message
     */
    'success_message' => 'You have successfully logged in',

    /**
     * Define the failed message
     */
    'failed_message' => 'Account not found. Please register first'
];
