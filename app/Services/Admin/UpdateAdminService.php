<?php

namespace App\Services\Admin;

use App\Enums\AdminTypes;
use App\Foundation\Services\BaseService;
use App\Models\Admin\Admin;
use App\Foundation\Models\BaseModel;
use Exception;

class UpdateAdminService extends BaseService
{

    /**
     * DeleteAdminFeature constructor.
     * @param BaseModel $resource
     */
    public function __construct(protected BaseModel $resource)
    {
    }

    /**
     * @return void
     * @throws Exception
     */
    public function update(): void
    {
        $this->resource->update($this->data());

        if ($this->getData('primary_admin') == AdminTypes::ADMIN->value && $this->getData('role_id')) {

            $this->resource->syncRoles($this->getData('role_id'));

        }

        if (request('profile_image')) {
            (new StoreAdminMediaService())
                ->setModel($this->resource)
                ->setCollection('profile_image')
                ->setFile(request('profile_image'))
                ->store();
        }
    }

    /**
     * @return array
     */
    private function data(): array
    {
        return [
            'name' => $this->getData('name'),
            'email' => $this->getData('email'),
            'password' => $this->getData('password'),
            'primary_admin' => $this->getData('primary_admin'),
        ];
    }
}
