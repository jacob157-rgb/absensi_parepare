<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permission
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $role = metaData();

        if (is_array($roles)) {
            if (in_array($role['roles'], $roles)) {
                 return $next($request);
            }
        } else {
            if ($role['roles'] == $roles) {
                 return $next($request);
            }
        }
        return abort(403);
    }
}
