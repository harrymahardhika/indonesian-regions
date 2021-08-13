<?php

namespace Concatenate\IndonesianRegions;

use Illuminate\Support\ServiceProvider;

class IndonesianRegionsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/indonesian-regions.php', 'indonesian-regions');

        // Register the service the package provides.
        $this->app->singleton('indonesian-regions', function ($app) {
            return new IndonesianRegions();
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return ['indonesian-regions'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/indonesian-regions.php' => config_path('indonesian-regions.php'),
        ], 'indonesian-regions.config');

        $this->publishes([
            __DIR__.'/../stubs/RegionSeeder.php.stub' => database_path('seeders/RegionSeeder.php'),
        ], 'indonesian-regions.stubs');
    }
}
