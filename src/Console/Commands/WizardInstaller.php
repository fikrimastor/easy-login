<?php

declare(strict_types=1);

namespace SulaimanMisri\EasyLogin\Console\Commands;

use Illuminate\Console\Command;

class WizardInstaller extends Command
{
    protected $signature = 'easy-login:install';
    protected $description = 'Install EasyLogin and set up necessary files';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Welcome to the EasyLogin installation wizard! 🚀');

        $this->askQuestions();

        $this->info('EasyLogin has been successfully installed 🎉');
        $this->info('Please give the package a star on GitHub if you like it: https://github.com/sulaimanmisri/easy-login');
    }

    /**
     * Series of questions
     */
    protected function askQuestions(): void
    {
        // Question 1: Install Laravel Socialite
        if ($this->confirm('This package require Laravel Socialite in order to work. Do you want to install Laravel Socialite now?', true)) {
            $this->installSocialite();
        } else {
            $this->line('Skipping Laravel Socialite installation.');
        }

        // Question 2: Publish the configuration file
        if ($this->confirm('Do you want to publish the EasyLogin configuration file now?', true)) {
            $this->publishConfig();
        } else {
            $this->line('Skipping configuration file publishing.');
        }
    }

    /**
     * Install Laravel Socialite
     */
    protected function installSocialite(): void
    {
        $this->info('Installing Laravel Socialite for you...');
        exec('composer require laravel/socialite');
        $this->info('Laravel Socialite installed successfully!');
    }

    /**
     * Publish the EasyLogin configuration file.
     */
    protected function publishConfig(): void
    {
        $this->info('Publishing EasyLogin configuration file...');

        $this->call('vendor:publish', [
            '--tag' => 'easy-login-config',
        ]);

        $this->info('Configuration file published successfully!');
    }
}
