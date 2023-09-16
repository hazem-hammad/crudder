<?php

namespace App\Foundation\Providers;

use App\Foundation\View\Components\Actions\DeleteButton;
use App\Foundation\View\Components\Actions\EditButton;
use App\Foundation\View\Components\Actions\SubmitButton;
use App\Foundation\View\Components\Forms\EmailField;
use App\Foundation\View\Components\Forms\PasswordField;
use App\Foundation\View\Components\Forms\SelectField;
use App\Foundation\View\Components\Forms\TextField;
use App\Foundation\View\Components\Forms\UploadField;
use App\Foundation\View\Components\Layouts\Footer;
use App\Foundation\View\Components\Layouts\Header;
use App\Foundation\View\Components\Layouts\Sidebar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class CoreServiceProvider extends BaseServiceProvider
{
    private string $view_path = __DIR__ . '/../Resources/views';
    private string $asset_path = __DIR__ . '/../assets';
    private string $migration_path = __DIR__ . '/../Database/migrations';

    /**
     * @return void
     */
    public function boot(): void
    {
        Blade::component('layouts.sidebar', Sidebar::class);
        Blade::component('layouts.header', Header::class);
        Blade::component('layouts.footer', Footer::class);

        Blade::component('actions.submit-button', SubmitButton::class);
        Blade::component('actions.edit-button', EditButton::class);
        Blade::component('actions.delete-button', DeleteButton::class);

        Blade::component('forms.text-field', TextField::class);
        Blade::component('forms.email-field', EmailField::class);
        Blade::component('forms.select-field', SelectField::class);
        Blade::component('forms.upload-field', UploadField::class);
        Blade::component('forms.password-field', PasswordField::class);
    }

    /**
     * Register the Course service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->loadMigrationsFrom([
            realpath($this->migration_path)
        ]);

        $this->registerResources();
    }

    /**
     * Register the Course service resource namespaces.
     *
     * @return void
     */
    protected function registerResources(): void
    {
        \View::addNamespace('Core', realpath($this->view_path));
    }

}
