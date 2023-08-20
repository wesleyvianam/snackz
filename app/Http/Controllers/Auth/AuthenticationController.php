<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticationController
{
    public function index()
    {
        return response()->json(["name" => "você esta authenticado"]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($credentials)) abort('401', 'Invalid Credentials');

        return response()->json(['token' => $request->user()->createToken('invoice')]);
    }
}
