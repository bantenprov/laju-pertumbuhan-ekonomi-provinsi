<?php namespace Bantenprov\LpeProvinsi;

use Illuminate\Support\ServiceProvider;
use Bantenprov\LpeProvinsi\Console\Commands\LpeProvinsiCommand;

/**
 * The LpeProvinsiServiceProvider class
 *
 * @package Bantenprov\LpeProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeProvinsiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('lpe-provinsi', function ($app) {
            return new LpeProvinsi;
        });

        $this->app->singleton('command.lpe-provinsi', function ($app) {
            return new LpeProvinsiCommand;
        });

        $this->commands('command.lpe-provinsi');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'lpe-provinsi',
            'command.lpe-provinsi',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('lpe-provinsi.php');

        $this->mergeConfigFrom($packageConfigPath, 'lpe-provinsi');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'lpe-provinsi');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/lpe-provinsi'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'lpe-provinsi');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/lpe-provinsi'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'lpe-provinsi-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'lpe-provinsi-public');
    }
}
