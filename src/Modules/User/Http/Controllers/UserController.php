<?php

namespace App\Modules\User\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Foundation\Builder\TableBuilder;
use App\Foundation\Builder\TableColumn;
use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Http\Controllers\BaseController;
use App\Foundation\Services\General\Response\WebSuccessResponse;
use App\Modules\User\Filters\UserFilters;
use App\Modules\User\Http\Requests\CreateUserRequest;
use App\Modules\User\Http\Requests\UpdateUserRequest;
use App\Modules\User\Models\User;
use App\Modules\User\Services\UsersDatatableService;
use App\Modules\User\Services\ChangeUserStatusService;
use App\Modules\User\Services\DeleteUserService;
use App\Modules\User\Services\StoreUserService;
use App\Modules\User\Services\UpdateUserService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class UserController extends BaseController
{

    protected string $viewPath = "User";

    public string $routePath = "admin.users";

    public string $moduleName = "User";

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
        $filters = new UserFilters(request());

        return (new UsersDatatableService())->setFilters($filters)->execute();
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view($this->viewPath . '::create');
    }

    /**
     * @param CreateUserRequest $createUserRequest
     * @return JsonResponse
     * @throws Exception
     */
    public function store(CreateUserRequest $createUserRequest): JsonResponse
    {
        try {

            $data = $createUserRequest->only('name_ar', 'name_en');

            (new StoreUserService())->setData($data)->execute();

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
     * @param User $baseModule
     * @return View
     */
    public function show(User $baseModule): View
    {
        $supportedLanguages = supportedLanguages();

        return view($this->config['views']['show'], [
            'supportedLanguages' => $supportedLanguages,
            'config' => $this->config,
            'row' => $baseModule,
        ]);
    }

    /**
     * @param User $baseModule
     * @return JsonResponse
     * @throws Exception
     */
    public function changeStatus(User $baseModule): JsonResponse
    {
        try {
            (new ChangeUserStatusService($baseModule))->execute();

            return (new WebSuccessResponse(message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage()))->toResponse();

        } catch (ErrorException $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }
    }

    /**
     * @param User $baseModule
     * @return View
     */
    public function edit(User $baseModule): View
    {
        return view($this->viewPath . '::edit', [
            'row' => $baseModule
        ]);
    }

    /**
     * @param User $baseModule
     * @param UpdateUserRequest $updateUserRequest
     * @return JsonResponse
     * @throws Exception
     */
    public function update(User $baseModule, UpdateUserRequest $updateUserRequest): JsonResponse
    {
        $data = $updateUserRequest->only('name_ar', 'name_en', 'status');

        (new UpdateUserService($baseModule))->setData($data)->execute();

        return (new WebSuccessResponse(message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage()))->toResponse();
    }

    /**
     * @param User $baseModule
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(User $baseModule): JsonResponse
    {
        try {
            (new DeleteUserService($baseModule))->execute();

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
