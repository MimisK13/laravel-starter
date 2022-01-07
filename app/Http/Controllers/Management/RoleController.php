<?php

namespace App\Http\Controllers\Management;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Management\Role;
use App\Http\Controllers\Controller;
use App\Models\Management\Permission;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        // TODO:
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
            'guard_name' => 'max:255',
            'permissions' => 'required'
        ]);

        $validated = Role::create(['name' => $request->get('name')]);
        $validated->syncPermissions($request->get('permissions', []));

        return redirect()
            ->route('roles.index')
            ->with('status', 'User Role successfully created!');
    }

    public function show(Role $role)
    {
        return view('roles.show', [
            'role' => $role,
            'permissions' => $role->getPermissionNames(),
            'users' =>  User::role($role)->get()
        ]);
    }

    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::all('id', 'name'),
            'selected' => $role->getAllPermissions()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->with('status', 'User Role successfully Updated!');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('status', 'User role successfully deleted!');
    }
}
