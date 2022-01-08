<?php

namespace App\Http\Controllers\Management;

use App\Http\Requests\Management\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Management\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Management\User\StoreUserRequest;

use function redirect;
use function view;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated())
            ->syncRoles($request->get('role'));

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully added!');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getPermissionsViaRoles()
	    ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all('id', 'name'),
            'selectedRoles' => $user->getRoleNames()
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->syncRoles($request->get('role'));

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully Updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully deleted!');
    }
}
