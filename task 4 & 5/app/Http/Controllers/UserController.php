<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //
    public function index()
    {
        //Eloquent ORM 
        //return collection
        if (!Gate::allows('users-view')) {
            abort(403);
        }
        $users = User::get();
        return view('admin.users.all', ['users' => $users]);
    }

    public function create()
    {

        $roles = Role::all();
        return view('admin.users.create', ['roles' => $roles]);
    }
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $user->assignRole($data['role']);
        return to_route('users.index');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        dd($user);
    }
}
