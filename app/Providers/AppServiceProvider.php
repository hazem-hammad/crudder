<?php

namespace App\Providers;

use App\Enums\Permission;
use App\View\Components\Actions\DeleteButton;
use App\View\Components\Actions\EditButton;
use App\View\Components\Actions\SubmitButton;
use App\View\Components\Forms\SelectField;
use App\View\Components\Forms\TextField;
use App\View\Components\Layouts\Footer;
use App\View\Components\Layouts\Header;
use App\View\Components\Layouts\Sidebar;
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

        Blade::component('sidebar', Sidebar::class);
        Blade::component('header', Header::class);
        Blade::component('footer', Footer::class);
        Blade::component('submit-button', SubmitButton::class);
        Blade::component('edit-button', EditButton::class);
        Blade::component('delete-button', DeleteButton::class);

        Blade::component('text-field', TextField::class);
        Blade::component('select-field', SelectField::class);

        View::composer('*', function ($view) {
            $permission = Permission::class;
            $view->with(['permission' => $permission]);
        });

        Paginator::useBootstrap();

    }
}
