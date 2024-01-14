<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ( ! Auth::attempt($validated)) {
            return response()->json([
                'message' => 'Login information invalid'
            ], 401);
        }

        $user = User::where('email', $validated['email'])->first();

        return response()->json([
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer'
        ]);

    }


    function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:8'
        ]);

        $validated['password'] = Hash::make($validated['password']);        

        $user = User::create($validated);

        return response()->json([
            'data' => $user,
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer'
        ], 201);
    }

}
