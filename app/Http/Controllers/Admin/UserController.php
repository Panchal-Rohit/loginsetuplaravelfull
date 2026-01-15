<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

/**
 * @noinspection PhpUndefinedMethodInspection
 */
class UserController extends Controller
{
    /**
     * 🔐 PERMISSION MIDDLEWARE
     */
    public function __construct()
    {
        $this->middleware('permission:users.view')->only('index');
        $this->middleware('permission:users.edit')->only('edit', 'update');
        $this->middleware('permission:users.delete')->only('destroy');

        // future use
        // $this->middleware('permission:users.create')->only('create','store');
    }

    /**
     * 📄 LIST USERS
     */
    public function index()
    {
        $users = User::with('role')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    /**
     * ✏️ EDIT USER ROLE
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * 🔄 UPDATE USER ROLE
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Role assigned successfully');
    }

    /**
     * 🗑️ DELETE USER
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'User deleted');
    }
}