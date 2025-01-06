<?php

namespace SulaimanMisri\EasyLogin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use SulaimanMisri\EasyLogin\Http\Services\CallbackServices;

class EasyLoginController extends Controller
{
    /**
     * Redirect user to the Github Authentication page
     */
    public function handleGithubRedirect(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Redirect user to the Google Authentication page
     */
    public function handleGoogleRedirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Redirect user to the Facebook Authentication page
     */
    public function handleFacebookRedirect(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Redirect user to the Twitter @ X Authentication page
     */
    public function handleTwitterRedirect(): RedirectResponse
    {
        return Socialite::driver('twitter-oauth-2')->redirect();
    }

    /**
     * Redirect user to the One Login Authentication page
     */
    public function handleOneLoginRedirect(): RedirectResponse
    {
        return Socialite::driver('one-login')->redirect();
    }

    /**
     * Handle application callback after authentication
     */
    public function callback(CallbackServices $callbackServices): RedirectResponse
    {
        $provider = Socialite::driver(request()->provider)->user();
        $user = $callbackServices->getUserEmailFrom($provider);

        if (!$user) {
            return $callbackServices->stopExecutionIfTheUserIsNotExists();
        }

        return $callbackServices->successAuth($user);
    }
}
