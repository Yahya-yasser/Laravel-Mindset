<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function checkSessions(Request $request)
    {
        // session(['username' => 'pierre']);
        $request->session()->put('username', 'pierre');
        return  'session saved';
    }

    public function flashSession(Request $request)
    {
        $user = User::create(['name' => 'thomas', 'email' => 'thomas@info.com', "password" => 123456789]);
        $user->givePermissionTo('users-view');

        
        $request->session()->flash('status', 'Task was successful!');
        // return redirect()->back()->with('status', "Task was seccessful");
        return 'session flash';
    }
}
