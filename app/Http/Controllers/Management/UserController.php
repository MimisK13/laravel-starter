<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function bcrypt;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        $validated = User::create($request->all())
            ->syncRoles($request->get('role'));

        return redirect()
            ->route('users.index')
            ->with('status', 'User successfully added!');
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
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->syncRoles($request->get('role'));

        return redirect()
            ->route('users.index')
            ->with('status', 'User successfully Updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('status', 'User successfully deleted!');
    }
}
