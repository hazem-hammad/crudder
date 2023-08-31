<?php

namespace App\Services\Admin;

use App\Models\Admin\Admin;

readonly class DeleteAdminService
{
    /**
     * DeleteAdminFeature constructor.
     *
     * @param Admin $resource
     */
    public function __construct(private Admin $resource)
    {
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->resource->delete();
    }
}
