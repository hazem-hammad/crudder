<?php

namespace App\Http\Controllers\Auth;

use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Services\General\Response\WebSuccessResponse;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use function redirect;
use function route;
use function view;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);

        app()->setLocale('en');
    }

    /**
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     * @throws Exception
     */
    public function login(Request $request): JsonResponse
    {
        // Validate the form data
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {

            // if successful, then redirect to their intended location
            return (new WebSuccessResponse(message: ResponseMessage::LOGGED_OUT_SUCCESSFULLY->getMessage()))->toResponse();
        }

        return webResponse([
            'has_redirect' => false,
            'url' => null,
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => __('lang.Invalid credentials')
        ]);

    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(): Redirector|RedirectResponse|Application
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
