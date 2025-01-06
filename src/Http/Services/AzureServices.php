<?php

namespace SulaimanMisri\EasyLogin\Http\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class AzureServices
{
    /**
     * Redirect user to the Azure Authentication page
     */
    public function handleRedirect(): RedirectResponse
    {
        $query = http_build_query([
            'client_id' => env('AZURE_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri' => env('AZURE_REDIRECT_URL'),
            'response_mode' => 'query',
            'scope' => 'openid profile email',
            'state' => csrf_token(),
        ]);

        $authUrl = 'https://login.microsoftonline.com/' . env('AZURE_TENANT_ID') . '/oauth2/v2.0/authorize?' . $query;

        return redirect($authUrl);
    }

    /**
     * Handle application callback after authentication
     */
    public function handleCallback(Request $request): array
    {
        if (!$request->has('code')) {
            return $this->executeIfCallbackIsFailed('Authorization code not found.');
        }

        $code = $request->input('code');
        $response = $this->getResponse($code);

        if ($response->failed()) {
            return $this->executeIfCallbackIsFailed('Failed to authenticate with Azure');
        }

        $tokenResponse = $response->json();
        $accessToken = $tokenResponse['access_token'];
        $userDataResponse = Http::withToken($accessToken)->get('https://graph.microsoft.com/v1.0/me');

        if ($userDataResponse->failed()) {
            return $this->executeIfCallbackIsFailed('Failed to retrieve user data.');
        }

        return $userDataResponse->json();
    }

    /**
     * Execute if the callback is failed
     */
    public function executeIfCallbackIsFailed(string $message = 'Failed to authenticate with Azure'): RedirectResponse
    {
        return redirect(config('easy-login.redirects.failure'))
            ->with('error', $message);
    }

    /**
     * Get the response from Azure
     */
    public function getResponse(string $code): Response
    {
        return Http::asForm()->post('https://login.microsoftonline.com/' . env('AZURE_TENANT_ID') . '/oauth2/v2.0/token', [
            'client_id' => env('AZURE_CLIENT_ID'),
            'client_secret' => env('AZURE_CLIENT_SECRET'),
            'redirect_uri' => env('AZURE_REDIRECT_URL'),
            'grant_type' => 'authorization_code',
            'code' => $code,
        ]);
    }
}
