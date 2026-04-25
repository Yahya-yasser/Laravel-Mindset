<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/about', function () {
    return "About Us";
});

Route::get('/user/{id}', function ($id) {
    return "User Profile: #$id";
});

Route::get('/search', function () {
    $q = request()->query('q'); 
    if ($q) {
        return "Search results for: " . $q;
    }
    return "Please type a search term";
});

Route::middleware('check_access')->get('/grades', function () {
    return "Student Grades";
});