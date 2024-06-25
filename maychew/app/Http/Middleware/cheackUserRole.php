<?php

namespace App\Http\Middleware;
use Closure;
class cheackUserRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized.');
        }
        return $next($request);
    }
}

