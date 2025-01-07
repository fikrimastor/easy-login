<?php

declare(strict_types=1);

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
        'redirect' => env('GOOGLE_REDIRECT_URL'),
    ],

    /**
     * Define the Facebook OAuth credentials
     */
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URL'),
    ],

    /**
     * Define the Twitter @ X OAuth credentials
     */
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_REDIRECT_URL'),
    ],

    /**
     * Define the Azure OAuth credentials
     */
    'azure' => [
        'client_id' => env('AZURE_CLIENT_ID'),
        'client_secret' => env('AZURE_CLIENT_SECRET'),
        'redirect' => env('AZURE_REDIRECT_URL'),
        'tenant' => env('AZURE_TENANT_ID'),
        'scopes' => env('OAUTH_SCOPES', 'openid'),
    ],

    /**
     * Define the LinkedIn OAuth credentials
     */
    'linkedin-openid' => [
        'client_id' => env('LINKEDIN_CLIENT_ID'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
        'redirect' => env('LINKEDIN_REDIRECT_URL'),
    ],

    /**
     * Define the Slack OAuth credentials
     */
    'slack-openid' => [
        'client_id' => env('SLACK_CLIENT_ID'),
        'client_secret' => env('SLACK_CLIENT_SECRET'),
        'redirect' => env('SLACK_REDIRECT_URL'),
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
