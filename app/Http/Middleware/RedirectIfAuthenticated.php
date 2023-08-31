<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param null $guard
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == 'admin' && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard == 'web' && Auth::guard($guard)->check()) {
            return redirect('/');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }

}
