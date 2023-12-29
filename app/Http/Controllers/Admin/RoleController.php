<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);

        return redirect()->route('admin.roles.index')->with('message', 'Role created successffully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);

        return redirect()->route('admin.roles.index')->with('message', 'Role updated successffully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('message', 'Role deleted');
    }


    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)) {
            return redirect()->route('admin.roles.index')->with('message', 'Permission already exist');
        }
        $role->givePermissionTo($request->permission);
        return redirect()->route('admin.roles.index')->with('message', 'Permission Added');
    }
}
