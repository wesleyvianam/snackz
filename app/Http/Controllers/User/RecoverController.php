<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\Recover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class RecoverController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->email;

        $token = "shdjklfhslkjdfhlskjdhfl";

        $this->saveToken($email, $token);

        $send = Mail::to("$email", 'name person')->send(new Recover([
            'fromEmail' => 'Snackz',
            'token' => $token,
            'message' => 'Use Token para refazer sua senha',
        ]));

        return response()->json($send);
    }

    public function update()
    {

    }

    private function saveToken($email, $token)
    {

        $query = DB::table('password_reset_tokens')
            ->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => new \DateTime()
            ]);

        dd($query);
    }
}
