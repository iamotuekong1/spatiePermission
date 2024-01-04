<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Permission::create($validated);

        return redirect()->route('admin.permissions.index')->with('message', 'Permission created successffully');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission->update($validated);

        return redirect()->route('admin.permissions.index')->with('message', 'Permission updated successffully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('message', 'Permission deleted');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if($permission->hasRole($request->role)){
            return redirect()->back()->with('message', 'Role exist');
        }

        $permission->assignRole($request->role);
        return redirect()->back()->with('message', 'Role assigned.');
    }

    public function revokeRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)) {
            $permission->removeRole($role);
            return redirect()->back()->with('message', 'Role removed');
        }
        return redirect()->back()->with('message', 'Role does not exist');
    }
}
