<?php

namespace App\Services\Setting;

class SettingConfigService
{
    /**
     * settingsConfigService constructor.
     */
    public function __construct(private readonly string $viewsPath = 'settings', private readonly string $routesPath = 'admin.settings')
    {
    }


    /**
     * @return array
     */
    public function get(): array
    {
        return [
            'page_title' => __("lang.Settings"),
            'update_title' => __('lang.Update Settings'),
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
            'index' => $this->routesPath . '.index',
            'update' => $this->routesPath . '.update',
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
            'update' => $this->viewsPath . '.update',
        ];
    }


    /**
     * get permissions
     *
     * @return array
     */
    protected function permissions(): array
    {
        return [];
    }
}
