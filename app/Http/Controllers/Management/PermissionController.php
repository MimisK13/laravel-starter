<?php

namespace App\Http\Controllers\Management;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Management\Permission;
use App\Http\Requests\Management\Permission\StorePermissionRequest;
use App\Http\Requests\Management\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions.index', [
            'permissions' => Permission::paginate(10) // simplePaginate()
        ]);
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Role Permission successfully added!');
    }

    public function show(Permission $permission)
    {
        return view('permissions.show', [
            'permission' => $permission,
            'roles' => $permission->getRoleNames(),
            'users' => User::permission($permission)->get()
        ]);
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        $permission->syncPermissions();

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Role Permission successfully added!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Role permission successfully deleted!');
    }
}
