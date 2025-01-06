<?php

declare(strict_types=1);

namespace SulaimanMisri\EasyLogin\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

interface EasyLoginServices
{

    /**
     * Redirects the user to the authentication page (e.g., OAuth provider or social login).
     *
     * @return RedirectResponse A response that redirects the user to the authentication page.
     * @throws AuthenticationException If the redirect cannot be initiated.
     */
    public function handleRedirect(): RedirectResponse;

    /**
     * Processes the callback request after the user completes authentication.
     *
     * @param Request $request The incoming request containing authentication data (e.g., tokens, codes).
     * @return array An array containing user information or tokens (e.g., ['user' => [...], 'token' => '...']).
     * @throws CallbackValidationException If the callback data is invalid or authentication fails.
     */
    public function handleCallback(Request $request): array;

    /**
     * Handles the scenario when the authentication callback fails.
     *
     * @param string $message A descriptive error message or code explaining why the callback failed.
     * @return array An array containing error details or fallback data (e.g., ['error' => $message, 'fallback_url' => '...']).
     */
    public function executeIfCallbackIsFailed(string $message): RedirectResponse;
}
