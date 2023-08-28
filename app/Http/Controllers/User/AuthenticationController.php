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

        if (!auth()->attempt($credentials)) abort('401', 'Invalid Credentials');

        return response()->json([
            'token' => $request->user()->createToken('invoice')
        ]);
    }
}
