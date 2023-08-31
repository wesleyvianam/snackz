<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticationController
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($credentials)) {
            abort(401, 'Invalid Credentials');
        }

        $user = $request->user();

        $user->tokens()->delete();

        $token = $user->createToken('invoice');

        return response()->json([
            'token' => $token
        ]);
    }
}
