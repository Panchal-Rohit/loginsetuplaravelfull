<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        // 🔒 User not logged in
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        $user = auth()->user();

        // 👑 Super Admin → ALL ACCESS
        if ($user->role && $user->role->name === 'super_admin') {
            return $next($request);
        }

        // ❌ No role assigned
        if (!$user->role) {
            abort(403, 'No role assigned');
        }

        // ❌ Permission check failed
        if (!$user->hasPermission($permission)) {
            abort(403, 'You do not have permission to access this page');
        }

        // ✅ Permission OK
        return $next($request);
    }
}
