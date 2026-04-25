<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
       $users =  User::get();
       return view('users', ['users'=> $users]);
    }
    public function show ($id)
    {

         $user = User:: findOrfail($id);
         dd($user);
    }
}
