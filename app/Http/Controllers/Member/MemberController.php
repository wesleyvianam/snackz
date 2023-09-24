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

        return view('member.index', compact('members'));
    }

    public function show(Member $member)
    {
        $user = User::where('id', $member->user_id)->get();
        $workspace = $this->getWorkspace();

        return response()->json([
            'id' => $member->id,
            'username' => $user[0]->username,
            'company' => $workspace->name,
            'name' => $member->name,
            'email' => $user[0]->email,
            'user_id' => $user[0]->id,
        ]);
    }

    public function store(Request $request)
    {
        $workspace = $this->getWorkspace();

        $save = DB::transaction(function () use ($request, $workspace) {
            $user = User::create([
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make("e46a73d1"),
                "config" => 0,
                "super" => 0
            ]);

            $member = $user->member()->create([
                "name" => $request->name,
                "workspace_id" => $workspace->id,
                "user_id" => $user->id,
            ]);

            return $member;
        });

        return to_route('member.index');
    }
}
