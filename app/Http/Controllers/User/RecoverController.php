<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\Recover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class RecoverController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->email;
        $send = Mail::to('wesley.vmartins.js@gmail.com', 'name person')->send(new Recover([
            'fromEmail' => 'Snackz',
            'token' => 'X0A8Gsa&sF',
            'message' => 'Use Token para refazer sua senha',
        ]));

        return response()->json($send);
    }

    public function update()
    {

    }
}
