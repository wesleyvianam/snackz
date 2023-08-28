<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $save = DB::transaction(function() use($request) {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
            ]);

            $workspace = $user->workspace()->create([
                'user_id' => $user->id
            ]);

            $user->member()->create([
                'name' => $request->name,
                'user_id' => $user->id,
                'workspace_id' => $workspace->id,
            ]);
        });

        if (!$save) abort(500, 'Error ao tentar criar usuário');

        return response()->json($save);
    }
}
