<?php

namespace App\Modules\BaseModule\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class BaseModuleServiceProvider extends ServiceProvider
{

    private string $config_path = __DIR__ . '/../Config/bla.php';
    private string $view_path = __DIR__ . '/../Resources/views';
    private string $asset_path = __DIR__ . '/../assets';
    private string $migration_path = __DIR__ . '/../Database/migrations';

    /**
     * Bootstrap migrations and factories for:
     * - `php artisan migrate` command.
     * - factory() helper.
     *
     * Previous usage:
     * php artisan migrate --path=src/Modules/Course/Database/migrations
     * Now:
     * php artisan migrate
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom([
            realpath($this->migration_path)
        ]);

    }

    /**
     * Register the Course service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the Course service resource namespaces.
     *
     * @return void
     */
    protected function registerResources(): void
    {
        # Merge application and packages configurations
        $this->mergeConfigFrom(
            $this->config_path,
            'BaseModule'
        );
//
//        # Add Config file to service provider publish command
//        $this->publishes([
//            $this->configPath => config_path('bla.php'),
//        ], 'Config');
//
        View::addNamespace('BaseModule', realpath($this->view_path));
    }
}
