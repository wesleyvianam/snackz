<?php

namespace App\Http\Controllers\Snack;

use App\Http\Controllers\Controller;
use App\Models\SnackItems;
use App\Models\SnackOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SnackOptionsController extends Controller
{
    public function store(SnackItems $snack, Request $request)
    {
        $snackOption = SnackOptions::create([
            'name' => $request->name,
            'snack_item_id' => $snack->id,
        ]);

        return response()->json($snackOption);
    }

    public function update(SnackItems $snack, SnackOptions $option, Request $request)
    {
        $user = Auth::user();

        if ($user->id != $snack->user_id) abort(403, 'Unauthorized');

        $update = $option->update([
            'name' => $request->name,
        ]);

        if (!$update) abort('500', 'Error');

        return response()->json("Successfully in update $option->name");
    }

    public function destroy(SnackItems $snack, SnackOptions $option, Request $request)
    {
        $user = Auth::user();

        if ($user->id != $snack->user_id) abort(403, 'Unauthorized');

        $delete = $option->delete();

        if (!$delete) abort('500', 'Error delete');

        return response()->json("Successfully in delete $option->name");
    }
}
