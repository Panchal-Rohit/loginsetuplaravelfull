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

        $roleId = $request->role_id ?? $roles->first()->id;

        $role = Role::with('permissions')->findOrFail($roleId);

        return view('admin.permissions.index', compact(
            'roles',
            'permissions',
            'role',
            'roleId'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array'
        ]);

        $role = Role::findOrFail($request->role_id);

        if ($role->name === 'super_admin') {
            return back()->with('error', 'Super Admin has all permissions');
        }

        $role->permissions()->sync($request->permissions ?? []);

        return redirect()
            ->route('admin.permissions.index', ['role_id' => $role->id])
            ->with('success', 'Permissions updated');
    }
}