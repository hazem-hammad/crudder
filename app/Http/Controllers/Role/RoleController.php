<?php

namespace App\Http\Controllers\Role;

use App\Foundation\Enums\Permissions;
use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Services\General\Response\WebSuccessResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role\Role;
use App\Services\Role\DeleteRoleService;
use App\Services\Role\GetPermissionsService;
use App\Services\Role\GetRolesService;
use App\Services\Role\RoleConfigService;
use App\Services\Role\StoreRoleService;
use App\Services\Role\UpdateRoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    /**
     * create new instance from controller
     *
     * RoleController constructor.
     */
    public function __construct(private array $config = [])
    {
        app()->setLocale('en');

        $this->config = (new RoleConfigService)->get();

        $this->middleware('auth:admin');

        $this->middleware('permission:' . $this->config['permissions']['index'])->only(['index', 'datatable']);
        $this->middleware('permission:' . $this->config['permissions']['create'])->only(['create', 'store']);
        $this->middleware('permission:' . $this->config['permissions']['update'])->only(['edit', 'update']);


    }

    /**
     * @return View
     */
    public function index(): View
    {
        $permissionsEnum = Permissions::class;

        $permissions = (new GetPermissionsService())->handle();

        $roles = (new GetRolesService())->execute();

        return view($this->config['views']['index'], [
            'config' => $this->config,
            'permissionsEnum' => $permissionsEnum,
            'permissions' => $permissions,
            'roles' => $roles,
            'row' => null
        ]);
    }

    /**
     * @param StoreRoleRequest $request
     * @return JsonResponse
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        (new StoreRoleService())->store();

        return (new WebSuccessResponse(
            message: ResponseMessage::CREATED_SUCCESSFULLY->getMessage(),
            hasRedirect: true,
            url: route($this->config['routes']['index'])))
            ->toResponse();

    }

    /**
     * @param Role $role
     * @return View
     */
    public function show(Role $role): View
    {
        $permissionsEnum = Permissions::class;

        $permissions = (new GetPermissionsService())->handle();

        return view($this->config['views']['show'], [
            'config' => $this->config,
            'role' => $role,
            'permissions' => $permissions,
            'permissionsEnum' => $permissionsEnum,
            'users' => $role->users()->get(),
        ]);
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return JsonResponse
     */
    public function update(UpdateRoleRequest $request, Role $role): JsonResponse
    {
        (new UpdateRoleService($role))->update();

        return (new WebSuccessResponse(
            message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage(),
            hasRedirect: true,
            url: route($this->config['routes']['index'])))->toResponse();
    }

    /**
     * @param Role $role
     * @return JsonResponse
     */
    public function delete(Role $role): JsonResponse
    {
        (new DeleteRoleService($role))->delete();

        return (new WebSuccessResponse(
            message: ResponseMessage::DELETED_SUCCESSFULLY->getMessage(),
            url: route($this->config['routes']['index'])))->toResponse();

    }
}
