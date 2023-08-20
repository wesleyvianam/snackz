<?php

namespace App\Http\Controllers\Snack;

use App\Http\Controllers\Controller;
use App\Models\SnackItems;
use Illuminate\Support\Facades\Auth;

class SnackListController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $snacks = SnackItems::where('user_id', $user->id)->with('snackOptions')->get();

        return $snacks;
    }
}
