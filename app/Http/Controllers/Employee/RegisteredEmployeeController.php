<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisteredEmployeeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $employee = User::where('parent_id', $user->id)->get();

        return Inertia::render('Employee/List', [
            'employees' => $employee
        ]);
    }

    public function create()
    {
        return Inertia::render('Employee/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'super' => $request->super,
            'parent_id' => $request->parent,
            'password' => Hash::make("12345678"),
        ]);
    }
}
