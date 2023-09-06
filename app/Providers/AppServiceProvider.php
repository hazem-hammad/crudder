<?php

namespace App\Providers;

use App\Foundation\Enums\Permissions;
use App\Foundation\View\Components\Actions\DeleteButton;
use App\Foundation\View\Components\Actions\EditButton;
use App\Foundation\View\Components\Actions\SubmitButton;
use App\Foundation\View\Components\Forms\SelectField;
use App\Foundation\View\Components\Forms\TextField;
use App\Foundation\View\Components\Layouts\Footer;
use App\Foundation\View\Components\Layouts\Header;
use App\Foundation\View\Components\Layouts\Sidebar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
