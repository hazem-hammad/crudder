<?php

namespace App\Services\Admin;


use App\Foundation\Enums\ActivationType;
use App\Models\Admin\Admin;

class ChangeAdminStatusService
{
    /**
     * @var Admin
     */
    private Admin $admin;

    public function change(): void
    {
        $this->admin->status == ActivationType::ACTIVE->getActivationStatus()
            ? $this->admin->update(['status' => ActivationType::IN_ACTIVE->getActivationStatus()])
            : $this->admin->update(['status' => ActivationType::ACTIVE->getActivationStatus()]);
    }

    /**
     * @param Admin $admin
     * @return self
     */
    public function setAdmin(Admin $admin): self
    {
        $this->admin = $admin;
        return $this;
    }
}
