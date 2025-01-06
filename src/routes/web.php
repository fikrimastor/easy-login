<?php

use Illuminate\Support\Facades\Route;
use SulaimanMisri\EasyLogin\Http\Controllers\EasyLoginController;
use SulaimanMisri\EasyLogin\Http\Controllers\EasyLoginForAzureController;

/**
 * ==============================
 * Provider Redirect Routes
 * ==============================
 */
Route::get('/auth/github/redirect', [EasyLoginController::class, 'handleGithubRedirect'])
    ->name('easy-login.github');

Route::get('/auth/google/redirect', [EasyLoginController::class, 'handleGoogleRedirect'])
    ->name('easy-login.google');

Route::get('/auth/facebook/redirect', [EasyLoginController::class, 'handleFacebookRedirect'])
    ->name('easy-login.facebook');

Route::get('/auth/twitter/redirect', [EasyLoginController::class, 'handleTwitterRedirect'])
    ->name('easy-login.twitter');

Route::get('/auth/azure/redirect', [EasyLoginForAzureController::class, 'handleAzureRedirect'])
    ->name('easy-login.azure');

Route::get('/auth/onelogin/redirect', [EasyLoginForAzureController::class, 'handleOneLoginRedirect'])
    ->name('easy-login.onelogin');


/**
 * ==============================
 * Provider Callback Routes
 * ==============================
 */
Route::get('/auth/{provider}/callback', [EasyLoginController::class, 'callback'])
    ->name('easy-login.callback');

Route::get('/auth/azure/callback', [EasyLoginForAzureController::class, 'handleAzureCallback'])
    ->name('easy-login.azure.callback');
