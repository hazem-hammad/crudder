<?php

namespace App\Services\Admin;

use App\Foundation\Services\BaseService;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class DatatableAdminsService extends BaseService
{
    /**
     * @var array $config
     */
    private array $config;

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(): JsonResponse
    {
        $this->config = (new AdminsConfigService())->get();

        $admins = (new GetAdminsService())->setFilters($this->filters)->getForDataTable();

        return DataTables::of($admins)
            ->editColumn('updated_at', function ($row) {
                return view($this->config['views']['datatable.updated_at'], [
                    'row' => $row,
                    'config' => $this->config
                ]);
            })
            ->editColumn('primary_admin', function ($row) {
                return view($this->config['views']['datatable.primary-admin'], [
                    'row' => $row,
                    'config' => $this->config
                ]);
            })
            ->editColumn('status', function ($row) {
                return view($this->config['views']['datatable.status'], [
                    'row' => $row,
                    'config' => $this->config
                ]);
            })
            ->editColumn('actions', function ($row) {
                return view($this->config['views']['datatable.actions'], [
                    'row' => $row,
                    'config' => $this->config,
                ]);
            })
            ->rawColumns(['updated_at', 'primary_admin'])
            ->make(true);
    }

}
