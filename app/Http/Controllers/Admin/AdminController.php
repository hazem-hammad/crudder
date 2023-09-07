<?php

namespace App\Http\Controllers\Admin;

use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Services\General\Auth\GetAuthAdminService;
use App\Foundation\Services\General\Response\WebSuccessResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Admin\Admin;
use App\Modules\BaseModule\Filters\BaseModuleFilters;
use App\Services\Admin\AdminsConfigService;
use App\Services\Admin\AdminsDatatableBuilderService;
use App\Services\Admin\ChangeAdminStatusService;
use App\Services\Admin\DatatableAdminsService;
use App\Services\Admin\DeleteAdminService;
use App\Services\Admin\GetAdminsService;
use App\Services\Admin\StoreAdminService;
use App\Services\Admin\UpdateAdminService;
use App\Services\Role\GetRolesService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    /**
     * create new instance from controller
     *
     * AdminController constructor.
     * @param array $config
     */
    public function __construct(private array $config = [])
    {
        app()->setLocale('en');
        $this->config = (new AdminsConfigService)->get();

        $this->middleware('auth:admin');

        $this->middleware('permission:' . $this->config['permissions']['index'])->only(['index', 'datatable']);
        $this->middleware('permission:' . $this->config['permissions']['create'])->only(['create', 'store']);
        $this->middleware('permission:' . $this->config['permissions']['update'])->only(['show', 'update']);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $datatable = (new AdminsDatatableBuilderService())->data();
        $activeAdminsCount = (new GetAdminsService())->count();
        return view($this->config['views']['index'], [
            'config' => $this->config,
            'datatable' => $datatable,
            'activeAdminsCount' => $activeAdminsCount,

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        $filters = new BaseModuleFilters(request());
        return (new DatatableAdminsService())->setFilters($filters)->execute();
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $roles = (new GetRolesService())->execute();
        return view($this->config['views']['create'], [
            'config' => $this->config,
            'roles' => $roles,
        ]);
    }

    /**
     * @param StoreAdminRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StoreAdminRequest $request): JsonResponse
    {
        try {
            $data = $request->only(['name', 'email', 'password', 'primary_admin', 'role_id', 'profile_image']);

            $admin = (new StoreAdminService())->setData($data)->handle();

            return (new WebSuccessResponse(
                message: ResponseMessage::CREATED_SUCCESSFULLY->getMessage(),
                hasRedirect: true,
                url: route($this->config['routes']['index'])))
                ->toResponse();
        } catch (Exception $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }

    }

    /**
     * @param Admin $admin
     * @return View
     */
    public function show(Admin $admin): View
    {
        $roles = (new GetRolesService())->execute();

        return view($this->config['views']['show'], [
            'config' => $this->config,
            'row' => $admin,
            'roles' => $roles,
        ]);
    }

    /**
     * @param UpdateAdminRequest $request
     * @param Admin $admin
     * @return JsonResponse
     * @throws Exception
     */
    public function update(UpdateAdminRequest $request, Admin $admin): JsonResponse
    {
        try {
            $authAdmin = (new GetAuthAdminService())->get();

            if ($admin->primary_admin && !$authAdmin->primary_admin) {
                abort(Response::HTTP_FORBIDDEN);
            }

            $data = $request->only(['name', 'email', 'password', 'primary_admin', 'role_id', 'profile_image']);
            (new UpdateAdminService($admin))->setData($data)->execute();

            return (new WebSuccessResponse(
                message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage(),
                hasRedirect: true,
                url: route($this->config['routes']['index'])))->toResponse();
        } catch (Exception $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }


    }

    /**
     * @param Admin $admin
     * @return JsonResponse
     * @throws Exception
     */
    public function changeStatus(Admin $admin): JsonResponse
    {
        try {
            (new ChangeAdminStatusService())->setAdmin($admin)->change();
            return (new WebSuccessResponse(message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage()))->toResponse();
        } catch (Exception $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }
    }

    /**
     * @param Admin $admin
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Admin $admin): JsonResponse
    {
        try {
            (new DeleteAdminService($admin))->handle();
            return (new WebSuccessResponse(message: ResponseMessage::DELETED_SUCCESSFULLY->getMessage()))->toResponse();
        } catch (Exception $exception) {
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }
    }
}
