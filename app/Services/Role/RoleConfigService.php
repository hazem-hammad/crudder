<?php

namespace App\Services\Role;

use App\Foundation\Enums\Permissions;

readonly class RoleConfigService
{
    /**
     * productsConfigService constructor.
     */
    public function __construct(private string $viewsPath = 'roles', private string $routesPath = 'roles')
    {
    }


    /**
     * @return array
     */

    public function get(): array
    {
        return [
            'page_title' => __("lang.Roles"),
            'create_title' => __('lang.Create role'),
            'update_title' => __('lang.Update role'),
            'routes' => $this->routes(),
            'views' => $this->views(),
            'permissions' => $this->permissions()
        ];
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
            'datatable.updated_at' => $this->viewsPath . '.datatable.updated_at',
            'datatable.status' => $this->viewsPath . '.datatable.status',
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
            'index' => Permissions::VIEW_ROLES,
            'create' => Permissions::CREATE_ROLE,
            'update' => Permissions::UPDATE_ROLE
        ];
    }
}
