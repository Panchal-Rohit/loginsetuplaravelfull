<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

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
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $user = Auth::user();

        // 👑 Super Admin → ALL ACCESS
        if ($user->role && $user->role->name === 'super_admin') {
            return $next($request);
        }
        // ❌ No role assigned
        if (!$user->role) {
            return redirect()->back()
                ->with('error', 'No role assigned');
        }

        // ❌ Permission check failed
        if (!$user->hasPermission($permission)) {
            return redirect()->back()
                ->with('error', 'You do not have permission to access this page');
        }

        // ✅ Permission OK
        return $next($request);
    }
}