<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    



    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all(); // 🔥 YAHI MAGIC HAI

        return view('admin.users.edit', compact('user', 'roles'));
    }

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



    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User deleted');
    }
}