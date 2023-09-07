<?php

namespace App\Foundation;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->register('App\Foundation\Providers\CoreServiceProvider');

        $this->app->register('App\Modules\BaseModule\Providers\BaseModuleServiceProvider');

        $this->app->register('App\Modules\User\Providers\UserServiceProvider');

        // Append service providers here //
    }
}
