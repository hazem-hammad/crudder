<?php

namespace App\Foundation\Http\Middleware;

use Closure;
use App;

class ApiLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = $request->header('Accept-Language');
        config()->set('app.locale', $language);
        App::setLocale($language);
        return $next($request);
    }
}
