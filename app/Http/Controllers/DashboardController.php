<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->hasRole('Admin')) {
            $totalUsers = User::count();
            $totalTasks = Task::count();
            $completedTasks = Task::where('status', 'Done')->count();
            $tasksOverview = Task::latest()->take(5)->get();
        } else {
            $totalUsers = 1; // Just themselves
            $totalTasks = $user->tasks()->count();
            $completedTasks = $user->tasks()->where('status', 'Done')->count();
            $tasksOverview = $user->tasks()->latest()->take(5)->get();
        }

        return view('dashboard', compact('totalUsers', 'totalTasks', 'completedTasks', 'tasksOverview'));
    }
}
