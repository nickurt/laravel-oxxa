<?php

namespace nickurt\Oxxa;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/oxxa.php' => config_path('oxxa.php')
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
}
