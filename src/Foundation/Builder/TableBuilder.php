<?php

namespace App\Foundation\Builder;

use Illuminate\Support\Collection;

class TableBuilder
{
    public Collection $table;

    public function __construct()
    {
        $this->table = new Collection();
    }

    public function addColumn(TableColumn $tableColumn): static
    {
        $this->table->push($tableColumn);

        return $this;
    }

    /**
     * @return array
     */
    public function generate(): array
    {
        return [
            'header' => $this->header(),
            'body' => $this->body(),
        ];
    }

    /**
     * get table header
     *
     * @return Collection
     */
    public function header(): Collection
    {
        $columns = new Collection();

        foreach ($this->table as $data) {
            $columns->push(tableDataCell($data->name, $data->class));
        }

        return $columns;
    }

    /**
     * get table body
     *
     * @return Collection
     */
    public function body(): Collection
    {
        $columns = new Collection();

        foreach ($this->table as $data) {
            $columns->push(['data' => $data->column, 'orderable' => $data->isSortable, 'searchable' => $data->isSearchable]);
        }

        return $columns;
    }
}
