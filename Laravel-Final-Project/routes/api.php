<?php

// all api endpoints define here

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']); // register endpoint
Route::post('/login', [AuthController::class, 'login']); // login endpoint

Route::middleware('auth:sanctum')->group(function () { // auth:sanctum middleware - token needed to access
    Route::post('/logout', [AuthController::class, 'logout']); // logout endpoint - after logout token is invalid

    // User Profile
    Route::get('/profile', [UserController::class, 'profile']); // show profile endpoint 
    Route::put('/profile', [UserController::class, 'updateProfile']); // update profile endpoint

    // Tasks
    Route::apiResource('tasks', TaskController::class)->names('api.tasks');
    // controller functions : index (list all tasks),
    //                        show (show specific task),
    //                        store (create new task), 
    //                        update (update task), 
    //                        destroy (delete task)
});
