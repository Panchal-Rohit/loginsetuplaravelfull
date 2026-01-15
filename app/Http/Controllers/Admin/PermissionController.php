<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $role = Role::with('permissions')
            ->find($request->role_id ?? $roles->first()->id);

        return view('admin.permissions.index', compact(
            'roles','permissions','role'
        ));
    }

    public function update(Request $request)
    {
        $role = Role::findOrFail($request->role_id);

        if ($role->name === 'super_admin') {
            return back()->with('error','Super Admin has all permissions');
        }

        $role->permissions()->sync($request->permissions ?? []);

        return back()->with('success','Permissions updated');
    }
}

