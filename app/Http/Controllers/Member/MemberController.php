<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $workspace = $this->getWorkspaceId();

        $members = Member::where('workspace_id', $workspace)->get();

        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        return view('members.show', compact($member));
    }

    public function store(Request $request): RedirectResponse
    {
        $workspaceId = $this->getWorkspaceId();

        DB::transaction(function () use ($request, $workspaceId) {
            $user = User::create([
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make("e46a73d1"),
                "config" => 0,
                "super" => 0
            ]);

            $user->member()->create([
                "name" => $request->name,
                "workspace_id" => $workspaceId,
                "user_id" => $user->id,
            ]);
        });

        return to_route('members.index');
    }

    public function destroy(Member $member): RedirectResponse
    {
        $member->user->delete();
        $member->delete();

        return to_route('members.index');
    }
}
