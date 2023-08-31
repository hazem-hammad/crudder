<?php

namespace App\Foundation\Traits;

trait HasAuthorization
{
    use Authenticated;

    /**
     * @param array $ability
     * @return bool|void
     */
    public function hasPermission(array $ability)
    {
        if(!has_permission($ability))
            return abort(403);
        return true;

    }
}
