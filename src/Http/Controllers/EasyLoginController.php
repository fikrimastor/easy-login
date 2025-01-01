<?php

namespace SulaimanMisri\EasyLogin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use SulaimanMisri\EasyLogin\Http\Services\CallbackServices;

class EasyLoginController extends Controller
{
    /**
     * Redirect user to the Github Authentication page
     */
    public function handleGithubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Redirect user to the Google Authentication page
     */
    public function handleGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Redirect user to the Facebook Authentication page
     */
    public function handleFacebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle application callback after authentication
     */
    public function callback(CallbackServices $callbackServices)
    {
        $provider = Socialite::driver(request()->provider)->user();
        $user = $callbackServices->getUserEmailFrom($provider);

        if (!$user) {
            return $callbackServices->stopExecutionIfTheUserIsNotExists();
        }

        return $callbackServices->successAuth($user);
    }
}
