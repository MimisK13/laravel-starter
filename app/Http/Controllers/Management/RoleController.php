<?php

namespace App\Http\Controllers\Management;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Management\Role;
use App\Http\Controllers\Controller;
use App\Models\Management\Permission;
use App\Http\Requests\Management\Role\StoreRoleRequest;
use App\Http\Requests\Management\Role\UpdateRoleRequest;

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

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()
            ->route('roles.index')
            ->with('success', 'User Role successfully created!');
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

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $permissions = $request->get('permissions');
        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->with('success', 'User Role successfully updated!');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('success', 'User role successfully deleted!');
    }
}
