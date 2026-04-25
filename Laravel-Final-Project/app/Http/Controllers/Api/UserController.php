<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
    // profile : show user profile 
// updateProfile : update user profile 
{
    public function profile(Request $request) // show user profile
    {
        return $request->user();
    }

    public function updateProfile(Request $request) // update user profile
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255', // name is required and must be a string
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],// email is required and must be a string and unique in users table
            'password' => 'nullable|string|min:8|confirmed', // password is required and must be a string and confirmed
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']); // hash password to stored as a cipher text
        }

        $user->update($validated); // update user profile

        return response()->json($user); // return updated user profile
    }
}
