<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $workspace = $this->getWorkspace();

        $members = $workspace->members()->get();

        return response()->json($members);
    }

    public function store(Request $request)
    {
        $workspace = $this->getWorkspace();

        $save = DB::transaction(function () use ($request, $workspace) {
            $user = User::create([
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);

            $member = $user->member()->create([
                "name" => $request->name,
                "workspace_id" => $workspace->id,
                "user_id" => $user->id,
            ]);

            return $member;
        });

        return response()->json($save);
    }


}
