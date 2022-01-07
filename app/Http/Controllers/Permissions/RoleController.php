<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
            'role' => $role
        ]);
    }

    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        //
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('status', 'User role successfully deleted!');
    }
}
