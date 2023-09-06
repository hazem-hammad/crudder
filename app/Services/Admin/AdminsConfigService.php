<?php

namespace App\Services\Admin;

use App\Foundation\Enums\Permissions;

readonly class AdminsConfigService
{
    /**
     * @param string $viewsPath
     * @param string $routesPath
     */
    public function __construct(private string $viewsPath = 'admins', private string $routesPath = 'admins')
    {
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return [
            'page_title' => __("lang.Admins"),
            'create_title' => __('lang.Create admin'),
            'update_title' => __('lang.Update admin'),
            'routes' => $this->routes(),
            'views' => $this->views(),
            'permissions' => $this->permissions()
        ];
    }

    /**
     * get page title
     *
     * @return string
     */
    protected function pageTitle(): string
    {
        return __("lang.Admins");
    }

    /**
     * get routes
     *
     * @return array
     */
    protected function routes(): array
    {
        return [
            'index' => 'admin.' . $this->routesPath . '.index',
            'create' => 'admin.' . $this->routesPath . '.create',
            'store' => 'admin.' . $this->routesPath . '.store',
            'show' => 'admin.' . $this->routesPath . '.show',
            'delete' => 'admin.' . $this->routesPath . '.delete',
            'update' => 'admin.' . $this->routesPath . '.update',
            'change-status' => 'admin.' . $this->routesPath . '.change-status',
            'datatable' => 'admin.' . $this->routesPath . '.datatable',
        ];
    }

    /**
     * get views path
     *
     * @return array
     */
    protected function views(): array
    {
        return [
            'index' => $this->viewsPath . '.index',
            'create' => $this->viewsPath . '.create',
            'show' => $this->viewsPath . '.show',
            'search' => $this->viewsPath . '.search',

            'datatable.actions' => $this->viewsPath . '.datatable.actions',
            'datatable.primary-admin' => $this->viewsPath . '.datatable.primary-admin',
            'datatable.updated_at' => $this->viewsPath . '.datatable.updated_at',
            'datatable.status' => $this->viewsPath . '.datatable.status',
            'datatable.checkbox' => $this->viewsPath . '.datatable.checkbox',
        ];
    }

    /**
     * get permissions
     *
     * @return array
     */
    protected function permissions(): array
    {
        return [
            'index' => Permissions::VIEW_ADMINS,
            'create' => Permissions::CREATE_ADMIN,
            'update' => Permissions::UPDATE_ADMIN,
            'change-status' => Permissions::CHANGE_ADMIN_STATUS,
            'change-image' => Permissions::CHANGE_ADMIN_PROFILE_IMAGE,
        ];
    }
}
