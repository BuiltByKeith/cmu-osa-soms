<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/error-unauthorized-page'); // Redirect if not authenticated
        }

        $userRoles = Auth::user()->roles->pluck('id')->toArray(); // Assuming roles is a collection of role objects

        foreach ($roles as $role) {
            if (in_array($role, $userRoles)) {
                return $next($request);
            }
        }

        return redirect('/error-unauthorized-page'); // Redirect if user does not have any of the required roles
    }
}
