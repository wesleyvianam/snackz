<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\Recover;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class RecoverController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->email;

        $token = Str::random(60);

        $result = $this->saveToken($email, $token);

        $send = Mail::to($email, 'name person')->send(new Recover([
            'fromEmail' => 'Snackz',
            'token' => $token,
            'email' => $email,
            'message' => 'Use Token para refazer sua senha',
        ]));

        return response()->json("Email enviado com successo");
    }

    public function update(Request $request)
    {
        $has = $this->verifyToken($request->email, $request->token);

        if (!$has) abort(403, 'Token ou Email Invalidos');

        if ($request->password == $request->confirmpassword) {
            $user = User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            if ($user) {
                if ($this->deleteToken($request->email, $request->token)) {
                    return response()->json('Successfully in update password');
                }
            }
        }

        return response()->json('Error ao tentar salvar nova senha.');
    }

    private function saveToken(string $email, string $token): bool
    {
        $ItHasPromptForNewPassword = $this->verifyEmail($email);

        if ($ItHasPromptForNewPassword) {
            return DB::table('password_reset_tokens')
                ->where('email', $email)
                ->update([
                    'token' => $token,
                    'created_at' => now()
                ]);
        }

        return DB::table('password_reset_tokens')
            ->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now()
            ]);
    }

    private function verifyEmail(string $email): bool
    {
        $result = DB::table('password_reset_tokens')
            ->where('email', '=', $email)
            ->get();

        return !empty($result[0]);
    }

    private function verifyToken(string $email, string $token): bool
    {
        $result = DB::table('password_reset_tokens')
            ->where('email', '=', $email)
            ->where('token', '=', $token)
            ->get();

        return !empty($result[0]);
    }

    private function deleteToken(string $email, string $token): bool
    {
        return DB::table('password_reset_tokens')
            ->where('email', '=', $email)
            ->where('token', '=', $token)
            ->delete();
    }
}
