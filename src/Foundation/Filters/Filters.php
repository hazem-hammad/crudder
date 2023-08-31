<?php

namespace App\Foundation\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filters
{
    /**
     * The Eloquent builder.
     *
     * @var Builder
     */
    protected Builder $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $filters = [];

    /**
     * Create a new ThreadFilters instance.
     *
     * @param Request $request
     */
    public function __construct(public Request $request)
    {
    }

    /**
     * Apply the filters.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function getFilters(): array
    {
        return array_filter($this->request->only($this->filters), function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });
    }
}
