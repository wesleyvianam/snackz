<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }
}
