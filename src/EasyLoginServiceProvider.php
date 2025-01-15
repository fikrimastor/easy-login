<?php

declare(strict_types=1);

namespace Sulaimanmisri\EasyLogin;

use RuntimeException;
use Illuminate\Support\ServiceProvider;
use SulaimanMisri\EasyLogin\Console\Commands\WizardInstaller;

class EasyLoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->mergeConfigToServices();

        $this->publishes([
            __DIR__ . '/config/easy-login.php' => config_path('easy-login.php'),
        ], 'easy-login-config');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Registering the console command
        if ($this->app->runningInConsole()) {
            $this->commands([
                WizardInstaller::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/easy-login.php', 'easy-login');
    }

    /**
     * Merge EasyLogin settings into config/services.php
     */
    protected function mergeConfigToServices(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/easy-login.php', 'services');

        // Add provider config
        config()->set('services.easy_login', array_merge(
            config('services.easy_login', []),
            config('easy-login', [])
        ));
    }

    /**
     * Handle Laravel Socialite installation check
     */
    public function checkLaravelSocialiteInstallation(): void
    {
        if (!class_exists('Laravel\Socialite\SocialiteServiceProvider')) {
            throw new RuntimeException(
                'Laravel Socialite is not installed. Please install it using `composer require laravel/socialite`.'
            );
        }
    }
}
