<?php

namespace nickurt\Oxxa;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/oxxa.php' => config_path('oxxa.php')
        ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['nickurt\Oxxa\Oxxa', 'Oxxa'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nickurt\Oxxa\Oxxa', function ($app) {
            $oxxa = new Oxxa($app);
            $oxxa->connection($oxxa->getDefaultConnection());

            return $oxxa;
        });

        $this->app->alias('nickurt\Oxxa\Oxxa', 'Oxxa');
    }
}
