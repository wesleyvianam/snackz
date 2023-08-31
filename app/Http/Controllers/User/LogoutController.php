<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();

        return response()->json(['message' => 'To the next.']);
    }
}
