<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //
    public function create()
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return Str::before($permission->name, '-');
        });
        return view('admin.settings.admin_mangment', ['permissions' => $permissions]);
    }
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create([
            'name' => $data['name'],
        ]);
        $role->syncPermissions($data['permissions']);
        return to_route('roles.create')->with('status', 'role Added successfully');
    }
}
