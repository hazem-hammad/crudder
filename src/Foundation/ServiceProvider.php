<?php

namespace App\Foundation;

use App\Foundation\Enums\Permissions;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $permissions = Permissions::class;

        view()->share([
            'permissions' => $permissions,
        ]);
    }

    public function register(): void
    {
        $this->app->register('App\Foundation\Providers\CoreServiceProvider');

        $this->app->register('App\Modules\BaseModule\Providers\BaseModuleServiceProvider');

        // Append service providers here //
    }
}
