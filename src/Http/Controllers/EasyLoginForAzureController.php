<?php

namespace SulaimanMisri\EasyLogin\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use SulaimanMisri\EasyLogin\Http\Services\AzureServices;
use SulaimanMisri\EasyLogin\Http\Services\CallbackServices;

class EasyLoginForAzureController extends Controller
{
    /**
     * Redirect user to the Azure Authentication page
     */
    public function handleAzureRedirect(AzureServices $azureServices): RedirectResponse
    {
        return $azureServices->handleRedirect();
    }

    /**
     * Handle the Azure callback
     */
    public function handleAzureCallback(AzureServices $azureServices, CallbackServices $callbackServices): RedirectResponse
    {
        $provider = $azureServices->handleCallback(request());
        $user = $callbackServices->getUserEmailFromAzure($provider);

        if (!$user) {
            return $callbackServices->stopExecutionIfTheUserIsNotExists();
        }

        return $callbackServices->successAuth($user);
    }
}
