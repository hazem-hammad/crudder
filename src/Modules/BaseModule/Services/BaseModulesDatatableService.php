<?php

namespace App\Modules\BaseModule\Services;

use App\Foundation\Services\BaseService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class BaseModulesDatatableService extends BaseService
{

    // TODO; use it from controller
    public string $viewPath = "BaseModule";

    /**
     * @return mixed
     * @throws Exception
     */
    public function execute(): JsonResponse
    {

        $data = (new GetBaseModulesService())->setFilters($this->filters)->getForDataTable();

        return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return view($this->viewPath.'::datatable.name', [
                    'row' => $row,
                ]);
            })
            ->editColumn('actions', function ($row) {
                return view($this->viewPath.'::datatable.actions', [
                    'row' => $row,
                ]);
            })
            ->editColumn('created_at', function ($row) {
                return view($this->viewPath.'::datatable.created_at', [
                    'row' => $row,
                ]);
            })
            ->editColumn('updated_at', function ($row) {
                return view($this->viewPath.'::datatable.created_at', [
                    'row' => $row,
                ]);
            })->make();
    }

}
