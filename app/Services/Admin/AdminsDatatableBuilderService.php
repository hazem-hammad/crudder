<?php

namespace App\Services\Admin;

class AdminsDatatableBuilderService
{
    /**
     * @return array
     */
    public function data(): array
    {
        return [
            'table_header' => $this->tableHeader(),
            'table_body' => $this->tableBody(),
        ];
    }

    /**
     * get table header
     *
     * @return array
     */
    public function tableHeader(): array
    {
        return [
            tableDataCell('#'),
            tableDataCell(__('Name')),
            tableDataCell(__('Status')),
            tableDataCell(__('primary admin')),
            tableDataCell(__('Created at')),
            tableDataCell(__('Actions')),
        ];
    }

    /**
     * get table body
     *
     * @return array
     */
    public function tableBody(): array
    {
        return [
            ['data' => 'id'],
            ['data' => 'name'],
            ['data' => 'status'],
            ['data' => 'primary_admin'],
            ['data' => 'updated_at'],
            ['data' => 'actions', 'orderable' => false],
        ];
    }
}
