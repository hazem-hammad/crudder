<?php

namespace App\Modules\BaseModule\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Read the routes from the "api.php" and "web.php" files of this Service
     *
     * @param Router $router
     */
    public function map(Router $router): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../Routes/web.php');
    }
}
