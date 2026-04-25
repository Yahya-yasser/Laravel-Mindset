<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller // class for : register & login & logout
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // email is unique in users table
            'password' => 'required|string|min:8|confirmed', // password is confirmed
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),// hash password to stored as a cipher text (not plain text)
        ]);

        $user->assignRole('User'); // assign user role (only regular users, not admins)

        $token = $user->createToken('auth_token')->plainTextToken; // generate token with laravel sanctum

        return response()->json([ // return response with token
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
        // return response with 201 status code (created)
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',// email is required and must be an email format
            'password' => 'required', // password is required
        ]);

        $user = User::where('email', $request->email)->first(); // find user with email

        if (!$user || !Hash::check($request->password, $user->password)) {
            // check if user exists and password is correct (compare pass with the hashed one)
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'], // show error message
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken; // IF PASS IS CORRECT : generate token with laravel sanctum

        return response()->json([ // return response with token
            'access_token' => $token,
            'token_type' => 'Bearer', // Bearer is a type of token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete(); // delete token (logout)

        return response()->json(['message' => 'Logged out successfully']); // return success message
    }
}
