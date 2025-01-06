<?php

declare(strict_types=1);

namespace SulaimanMisri\EasyLogin\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CallbackServices
{
    /**
     * Get the user email from the provider, to check if the user is exists
     */
    public function getUserEmailFrom($provider)
    {
        return User::where('email', $provider->getEmail())->first();
    }

    /**
     * Get the user email in Azure
     */
    public function getUserEmailFromAzure($provider)
    {
        return User::where('email', $provider['mail'])->first();
    }

    /**
     * Stop the execution if the user is not exists
     */
    public function stopExecutionIfTheUserIsNotExists(): RedirectResponse
    {
        return redirect(config('easy-login.redirects.failure'))
            ->with(
                'easy-error',
                config('easy-login.failed_message')
            );
    }

    /**
     * Handle the success auth from the provider logic
     */
    public function successAuth($user): RedirectResponse
    {
        session()->flash('easy-success', config('easy-login.success_message'));
        Auth::login($user);
        return redirect(config('easy-login.redirects.success'));
    }
}
