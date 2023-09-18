<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class settingsController extends Controller
{
    public function index()
    {
        $hello = "Hello World";

        return view('settings.index', compact('hello'));
    }
}
