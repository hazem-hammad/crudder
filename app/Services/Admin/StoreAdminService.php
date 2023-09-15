<?php

namespace App\Services\Admin;

use App\Enums\AdminTypes;
use App\Foundation\Enums\ActivationType;
use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Models\Admin\Admin;
use Exception;

class StoreAdminService extends BaseService
{
    /**
     * StoreAdminService constructor.
     */
    public function __construct(protected BaseModel $resource = new Admin())
    {
    }

    /**
     * @return BaseModel
     * @throws Exception
     */
    public function execute(): BaseModel
    {
        $admin = $this->resource->create($this->data());

        if ($this->getData('primary_admin') == AdminTypes::ADMIN->value && $this->getData('role_id')) {
            $admin->syncRoles($this->getData('role_id'));
        }

        if (request()->file('profile_image')) {
            (new StoreAdminMediaService())
                ->setModel($admin)
                ->setCollection('profile_image')
                ->setFile(request()->file('profile_image'))
                ->store();
        }
        return $admin;
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
            'status' => ActivationType::ACTIVE->getActivationStatus(),
            'primary_admin' => $this->getData('primary_admin'),
        ];
    }
}
