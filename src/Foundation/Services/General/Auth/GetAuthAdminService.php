<?php

namespace App\Foundation\Services\General\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class GetAuthAdminService
{
    /**
     * @return Authenticatable|null
     */
    public function get(): ?Authenticatable
    {
        return auth()->user();
    }
}
