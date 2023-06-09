<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::all();

        return view('admin.pages.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
       $validated = $request->validate(['name' => ['required', 'min:3']]);

       Role::create($validated);



       return to_route('roles.index', );
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required']]);
        $role->update($validated);

        return to_route('roles.index');
    }

    public function destroy(Role $role) {
        $role->delete();

        return back()->with('message', 'Role deleted.');
    }

    public function givePermission(Request $request, Role $role)
    {

        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission already exists.');
        }

        $role->givePermissionTo($request->permission);

        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)

    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }

        return back()->with('message', 'Permission not exist.');
    }
}
