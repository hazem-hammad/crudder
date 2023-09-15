<?php

namespace App\Providers;

use App\Foundation\Enums\Permissions;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (env('REDIRECT_HTTPS')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $permission = Permissions::class;
            $view->with(['permission' => $permission]);
        });

        Paginator::useBootstrap();

    }
}
