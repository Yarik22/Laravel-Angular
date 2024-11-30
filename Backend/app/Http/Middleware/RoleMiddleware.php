<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{

    public function handle($request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        $rolesArray = explode('|', $roles);
        if (!in_array($user->role, $rolesArray)) {
            return redirect('errors/401');
        }

        return $next($request);
    }
}
