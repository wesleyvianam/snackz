<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = User::where('workspace_id', $this->getWorkspaceId())->get();

        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        return view('members.show', compact($member));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make("12345678"),
            "super" => 0,
            "workspace_id" => $this->getWorkspaceId()
        ]);

        return to_route('members.index')->with(['success' => "User $user->name created successfully"]);
    }

    public function destroy(User $user): RedirectResponse
    {
        if (!$user->super) {
            $user->delete();
        }

        return to_route('members.index')->with(['success' => "User $user->name deleted successfully"]);
    }
}
