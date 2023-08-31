<?php

namespace App\Modules\BaseModule\Filters;

use App\Foundation\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class BaseModuleFilters extends Filters
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
