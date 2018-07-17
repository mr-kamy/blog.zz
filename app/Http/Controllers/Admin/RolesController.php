<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('backend.roles.create');

    }

    public function store(RoleFormRequest $request)
    {
        $role = Role::create(['name' => $request->get('name'), 'guard_name' => $request->get('guard_name')]);
        return redirect('admin/roles/create')->with('status', 'your role ' . $role->name . ' is created');
    }
}
