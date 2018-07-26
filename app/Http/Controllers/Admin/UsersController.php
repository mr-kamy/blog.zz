<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $userRole = $user->roles()->pluck('name')[0];
        return view('backend.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update($id, Request $request)
    {
        $user = User::whereId($id)->firstOrFail();
        $roleId = $user->roles->pluck('id')[0];

        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if ($password != ''){
            $user->password = Hash::make($password);
        }
        $user->save;
        $user->roles()->updateExistingPivot($roleId, ['role_id' => $request->get('role')]);
        return redirect(action('Admin\UsersController@edit', $user->id))->with('status',
            'The user has been updated');
    }
}
