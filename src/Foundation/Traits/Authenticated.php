<?php

namespace App\Foundation\Traits;

trait Authenticated
{

    /**
     * @var string[]
     */
    private $guards = ['admin', 'web', 'api'];

    /**
     * @param string|null $guard
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function auth(string $guard = null)
    {
        if(!is_null($guard))
            return $this->auth_guard($guard)->user();

        # detect available authentication
        foreach($this->guards as $guardType) {
            $auth = $this->auth_guard($guardType)->user();

            if(!is_null($auth))
                return $auth;
        }
        return null;
    }

    /**
     * @param string $guard
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private function auth_guard(string $guard)
    {
        return auth()->guard($guard);
    }

}
