<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) abort(401, 'Unauthorized');

        $team = User::where('parent_id', $user->id)->get();

        return $team;
    }
}
