<?php

declare(strict_types=1);

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
     * Redirect user to the LinkedIn Authentication page
     */
    public function handleLinkedinRedirect(): RedirectResponse
    {
        return Socialite::driver('linkedin-openid')->redirect();
    }

    /**
     * Redirect user to the Slack Authentication page
     */
    public function handleSlackRedirect(): RedirectResponse
    {
        return Socialite::driver('slack-openid')->redirect();
    }

    /**
     * Redirect user to the Bitbucket Authentication page
     */
    public function handleBitbucketRedirect(): RedirectResponse
    {
        return Socialite::driver('bitbucket')->redirect();
    }

    /**
     * Redirect user to the Gitlab Authentication page
     */
    public function handleGitlabRedirect(): RedirectResponse
    {
        return Socialite::driver('gitlab')->redirect();
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
