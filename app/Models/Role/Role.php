<?php

namespace App\Models\Role;

use App\Filters\Role\RoleFilters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name'
    ];


    /**
     * Apply all relevant Sizes filters
     *
     * @param $query
     * @param RoleFilters $filters
     * @return Builder
     */
    public function scopeFilter($query, RoleFilters  $filters): Builder
    {
        return $filters->apply($query);
    }

}
