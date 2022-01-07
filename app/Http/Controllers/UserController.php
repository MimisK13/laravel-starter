<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
            ->syncRoles($request->get('roles'));

        // Create the user
//        if ( $user = User::create($request->except('roles', 'permissions')) ) {
//            $this->syncPermissions($request, $user);
//        }


//        } else {
//
//        }

        //User::assignRole($request->get('roles'));

        //$user->syncRoles($request->get('roles'));
        //$user->assignRole($request->get('roles'));

        return redirect()
            ->route('users.index')
            ->with('status', 'User successfully added!');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
	    ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('status', 'User successfully deleted!');
    }
}
