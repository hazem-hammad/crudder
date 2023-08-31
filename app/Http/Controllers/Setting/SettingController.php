<?php

namespace App\Http\Controllers\Setting;

use App\Enums\ResponseMessage;
use App\Foundation\Services\General\Response\WebSuccessResponse;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Services\General\Auth\GetAuthAdminService;
use App\Services\Setting\GetSettingService;
use App\Services\Setting\SettingConfigService;
use App\Services\Setting\UpdateSettingService;
use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    /**
     * create new instance from controller
     *
     * SettingController constructor.
     */
    public function __construct(private array $config = [])
    {
        app()->setLocale('en');

        $this->config = (new SettingConfigService)->get();

        $this->middleware('auth:admin');

        $this->middleware(function (Request $request, Closure $next) {
            $admin = (new GetAuthAdminService())->get();
            if (!$admin->primary_admin) {
                abort(Response::HTTP_FORBIDDEN);
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $setting = (new GetSettingService())->first();
        return view($this->config['views']['update'], [
            'setting' => $setting,
            'config' => $this->config,
        ]);
    }

    /**
     * @param UpdateSettingRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function update(UpdateSettingRequest $request): JsonResponse
    {
        try {
            $data = $request->only('reply_ticket', 'close_ticket_after_first_reply');
            (new UpdateSettingService())->setData($data)->Update();

            return (new WebSuccessResponse(
                message: ResponseMessage::UPDATED_SUCCESSFULLY->getMessage()
            ))->toResponse();
        } catch (Exception $exception) {
            throw new Exception(ResponseMessage::SOME_THING_WENT_WRONG->getMessage());
        }
    }

}
