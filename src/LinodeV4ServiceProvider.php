<?php

namespace LittleGreenMan\LinodeV4;

use Illuminate\Support\ServiceProvider;

class LinodeV4ServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'littlegreenman');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'littlegreenman');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/linodev4.php', 'linodev4');

        // Register the service the package provides.
        $this->app->singleton('linodev4', function ($app) {
            return new LinodeV4;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['linodev4'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/linodev4.php' => config_path('linodev4.php'),
        ], 'linodev4.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/littlegreenman'),
        ], 'linodev4.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/littlegreenman'),
        ], 'linodev4.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/littlegreenman'),
        ], 'linodev4.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
