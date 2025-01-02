<?php

use Illuminate\Support\Facades\Route;
use SulaimanMisri\EasyLogin\Http\Controllers\EasyLoginController;

/**
 * Provider Redirect Routes
 */
Route::get('/auth/github/redirect', [EasyLoginController::class, 'handleGithubRedirect'])
    ->name('easy-login.github');

Route::get('/auth/google/redirect', [EasyLoginController::class, 'handleGoogleRedirect'])
    ->name('easy-login.google');

Route::get('/auth/facebook/redirect', [EasyLoginController::class, 'handleFacebookRedirect'])
    ->name('easy-login.facebook');

Route::get('/auth/twitter/redirect', [EasyLoginController::class, 'handleTwitterRedirect'])
    ->name('easy-login.twitter');

/**
 * Provider Callback Routes
 */
Route::get('/auth/{provider}/callback', [EasyLoginController::class, 'callback'])
    ->name('easy-login.callback');
