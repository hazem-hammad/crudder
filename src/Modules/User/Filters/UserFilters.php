<?php

namespace App\Modules\User\Filters;

use App\Foundation\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class UserFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $filters = [
        'name', 'status'
    ];

    /**
     * Filter the query status.
     *
     * @return Builder
     */
    protected function status(): Builder
    {
        return $this->builder->where('status', $this->request->status);
    }

    /**
     * Filter the query name.
     *
     * @return Builder
     */
    protected function name(): Builder
    {
        return $this->builder->where('name_en', 'LIKE', '%' . $this->request->name . '%');
    }

}
