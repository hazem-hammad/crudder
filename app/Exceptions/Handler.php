<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException as ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = Arr::get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
                $login = 'admin.login';
                break;

            default:
                $login = 'website.auth.login';
                break;
        }

        return redirect()->guest(route($login));
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return mixed
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {

            if ($exception instanceof ValidationException) {
                return response()->json(['message' => $exception->validator->errors()->first(), 'errors' => $exception->validator->getMessageBag()], 422);
            }

            if ($exception instanceof AuthenticationException) {
                return $this->apiErrorResponse(__('unauthenticated'), Response::HTTP_UNAUTHORIZED);
            }

            if ($exception instanceof ModelNotFoundException) {
                return $this->apiErrorResponse(__('model not found'), Response::HTTP_NOT_FOUND);
            }

            if ($exception instanceof AuthorizationException) {
                return $this->apiErrorResponse(__('unauthenticated'), Response::HTTP_FORBIDDEN);
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                return $this->apiErrorResponse(__('method not allowed'), Response::HTTP_METHOD_NOT_ALLOWED);
            }

            if ($exception instanceof NotFoundHttpException) {
                return $this->apiErrorResponse(__('url not found'), Response::HTTP_NOT_FOUND);
            }

            if ($exception instanceof HttpException) {
                if ($exception->getStatusCode() == 403) {
                    return $this->apiErrorResponse(__('unauthorized'), Response::HTTP_FORBIDDEN);
                }
                return $this->apiErrorResponse('http wrong', $exception->getStatusCode());
            }

            //return apiErrorResponse('Unexpected Exception , try later', 500);
        }
        return parent::render($request, $exception);
    }

    /**
     * @param string|null $message
     * @param $status_code
     * @return JsonResponse
     */
    protected function apiErrorResponse(string $message, $status_code): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ])->setStatusCode($status_code ?: Response::HTTP_BAD_REQUEST);
    }

}
