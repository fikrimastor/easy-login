<?php

namespace SulaimanMisri\EasyLogin\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
     * Stop the execution if the user is not exists
     */
    public function stopExecutionIfTheUserIsNotExists()
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
    public function successAuth($user)
    {
        session()->flash('easy-success', config('easy-login.success_message'));
        Auth::login($user);
        return redirect(config('easy-login.redirects.success'));
    }
}
