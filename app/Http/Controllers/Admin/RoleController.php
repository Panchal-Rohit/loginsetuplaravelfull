<?php

namespace App\Http\Controllers\Admin;
use App\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // public function create()
    // {
    //     return view('admin.roles.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'=>'required|unique:roles'
    //     ]);

    //     Role::create([
    //         'name'=>$request->name
    //     ]);

    //     return redirect()->route('admin.users.index')
    //            ->with('success','Role Created Successfully');
    // }
     public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success','Role Created');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $editRole = Role::findOrFail($id);

        return view('admin.roles.index', compact('roles','editRole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success','Role Updated');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->back()->with('success','Role Deleted');
    }
}