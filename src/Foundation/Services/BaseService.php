<?php

namespace App\Foundation\Services;

use App\Foundation\Filters\Filters;
use App\Foundation\Models\BaseModel;

abstract class BaseService
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * @var BaseModel
     */
    protected BaseModel $resource;

    /**
     * @var Filters
     */
    protected Filters $filters;

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param string|null $column
     * @return array|string|null
     */
    public function getData(string $column = null): array|string|null
    {
        return $column ? ($this->data[$column] ?? null) : $this->data;
    }

    /**
     * @param BaseModel $resource
     * @return $this
     */
    public function setResource(BaseModel $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * @param Filters $filters
     * @return self
     */
    public function setFilters(Filters $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    /**
     * Main function in each service
     * @return BaseModel|bool|void
     */
    abstract function execute();

}
