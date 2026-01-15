<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('can')) {

    /**
     * Check if logged-in user has permission
     *
     * @param string $permission
     * @return bool
     */
    function can(string $permission): bool
    {
        if (!Auth::check()) {
            return false;
        }

        return Auth::user()->hasPermission($permission);
    }
}