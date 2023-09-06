<?php

namespace App\Modules\BaseModule\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Foundation\Builder\TableBuilder;
use App\Foundation\Builder\TableColumn;
use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Http\Controllers\BaseController;
use App\Foundation\Services\General\Response\WebSuccessResponse;
use App\Modules\BaseModule\Filters\BaseModuleFilters;
use App\Modules\BaseModule\Http\Requests\CreateBaseModuleRequest;
use App\Modules\BaseModule\Http\Requests\UpdateBaseModuleRequest;
use App\Modules\BaseModule\Models\BaseModule;
use App\Modules\BaseModule\Services\BaseModulesDatatableService;
use App\Modules\BaseModule\Services\ChangeBaseModuleStatusService;
use App\Modules\BaseModule\Services\DeleteBaseModuleService;
use App\Modules\BaseModule\Services\StoreBaseModuleService;
use App\Modules\BaseModule\Services\UpdateBaseModuleService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class BaseModuleController extends BaseController
{

    protected string $viewPath = "BaseModule";

    public string $routePath = "admin.base-modules";

    public string $moduleName = "BaseModule";

    protected string $createFormType = "popup";

    protected bool $deletionAllowed = true;

    protected bool $displayPageStatistics = true;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        app()->setLocale('en');

        $this->middleware('auth:admin');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return $this->view($this->viewPath . '::index', [
            'table' => $this->tableColumns,
        ]);
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        $filters = new BaseModuleFilters(request());

        return (new BaseModulesDatatableService())->setFilters($filters)->execute();
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view($this->viewPath . '::create');
    }

    /**
     * @param CreateBaseModuleRequest $createBaseModuleRequest
     * @return JsonResponse
     * @throws Exception
     */
    public function store(CreateBaseModuleRequest $createBaseModuleRequest): JsonResponse
    {
        try {

            $data = $createBaseModuleRequest->only('name_ar', 'name_en', 'status');

            (new StoreBaseModuleService())->setData($data)->execute();

            return (new WebSuccessResponse(
                message: ResponseMessage::CREATED_SUCCESSFULLY->getMessage(),
                hasRedirect: true
            ))
                ->toResponse();

        } catch (ErrorException $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }
    }

    /**
     * @param BaseModule $baseModule
     * @return View
     */
    public function show(BaseModule $baseModule): View
    {
        $supportedLanguages = supportedLanguages();

        return view($this->config['views']['show'], [
            'supportedLanguages' => $supportedLanguages,
            'config' => $this->config,
            'row' => $baseModule,
        ]);
    }

    /**
     * @param BaseModule $baseModule
     * @return JsonResponse
     * @throws Exception
     */
    public function changeStatus(BaseModule $baseModule): JsonResponse
    {
        try {
            (new ChangeBaseModuleStatusService($baseModule))->execute();

            return (new WebSuccessResponse(message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage()))->toResponse();

        } catch (ErrorException $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }
    }

    /**
     * @param BaseModule $baseModule
     * @return View
     */
    public function edit(BaseModule $baseModule): View
    {
        return view($this->viewPath . '::edit', [
            'row' => $baseModule
        ]);
    }

    /**
     * @param BaseModule $baseModule
     * @param UpdateBaseModuleRequest $updateBaseModuleRequest
     * @return JsonResponse
     * @throws Exception
     */
    public function update(BaseModule $baseModule, UpdateBaseModuleRequest $updateBaseModuleRequest): JsonResponse
    {
        $data = $updateBaseModuleRequest->only('name_ar', 'name_en', 'status');

        (new UpdateBaseModuleService($baseModule))->setData($data)->execute();

        return (new WebSuccessResponse(message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage()))->toResponse();
    }

    /**
     * @param BaseModule $baseModule
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(BaseModule $baseModule): JsonResponse
    {
        try {
            (new DeleteBaseModuleService($baseModule))->execute();

            return (new WebSuccessResponse(message: ResponseMessage::DELETED_SUCCESSFULLY->getMessage()))->toResponse();

        } catch (Exception $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }
    }

    /**
     * Build table data (header & body)
     * @return void
     */
    protected function table(): void
    {
        $this->tableColumns = (new TableBuilder())
            ->addColumn(TableColumn::create()->setColumn('id')->setName('#')->setIsSortable(true))
            ->addColumn(TableColumn::create()->setColumn('name')->setName('Name')->setIsSortable(true))
            ->addColumn(TableColumn::create()->setColumn('status')->setName('Status')->setIsSortable(true))
            ->addColumn(TableColumn::create()->setColumn('created_at')->setName('Creation date')->setIsSortable(true))
            ->addColumn(TableColumn::create()->setColumn('actions')->setName('Actions')->setIsSortable(true))
            ->generate();
    }

}
