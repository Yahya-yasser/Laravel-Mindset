<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCompletedMail;

class TaskController extends Controller
    // index(show all tasks)
// store (create new task)
// show (show specific task)
// update (update task)
// destroy (delete task)
{
    use AuthorizesRequests; // kol user y4of w y3dl al haga bta3to howa bs ama admin y4of kol haga

    public function index(Request $request)
    {
        $user = auth()->user(); // ygeb al user 
        $query = $user->hasRole('Admin') ? Task::query() : $user->tasks(); //Role : user wla admin 

        if ($request->has('status')) {
            $query->where('status', $request->status); // ygeb el task by status
        }

        return $query->with('user')->latest()->paginate(10); //  list all tasks by last created , limit 10 patches 
    }

    public function store(Request $request) // create new task
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:To Do,In Progress,Done',
            'priority' => 'required|in:Low,Medium,High',
        ]);

        $task = auth()->user()->tasks()->create($validated); // map task lel user al haly (user_id = )

        return response()->json($task, 201); // return response with 201 status code (created)
    }

    public function show(Task $task) // show specific task
    {
        $this->authorize('view', $task); // check if user has permission to view task
        return $task->load('user'); // return task with user
    }

    public function update(Request $request, Task $task) // update task
    {
        $this->authorize('update', $task); // check if user has permission to update task (ADMIN OR OWN USER TASK)

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:To Do,In Progress,Done',
            'priority' => 'sometimes|required|in:Low,Medium,High',
            // SOMEIMES : y3dl goz2 mn al data msh lazem kolo
        ]);

        $task->update($validated); // y3dl al data 

        if ($task->status === 'Done') { // ygeb al task by status
            Mail::to($task->user->email)->send(new TaskCompletedMail($task)); // mail to user when task is done
        }

        return response()->json($task); // return updated task
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // check if user has permission to delete task (ADMIN OR OWN USER TASK)
        $task->delete(); // delete task

        return response()->json(null, 204); // return response with 204 status code (no content)
    }
}
