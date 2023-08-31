<?php

namespace App\Foundation;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->register('App\Modules\BaseModule\Providers\BaseModuleServiceProvider');
    }
}
