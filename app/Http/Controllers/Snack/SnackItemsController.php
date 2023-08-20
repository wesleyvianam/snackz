<?php

namespace App\Http\Controllers\Snack;

use App\Http\Controllers\Controller;
use App\Models\SnackItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SnackItemsController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $snackItem = SnackItems::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $user->id,
        ]);

        return response()->json($snackItem);
    }

    public function update(SnackItems $snack, Request $request)
    {
        $user = Auth::user();

        if ($user->id != $snack->user_id) abort(403, 'Unauthorized');

        $update = $snack->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if (!$update) abort('500', 'Error');

        return response()->json("Successfully in update $snack->name");
    }

    public function destroy(SnackItems $snack, Request $request)
    {
        $user = Auth::user();

        if ($user->id != $snack->user_id) abort(403, 'Unauthorized');

        $delete = $snack->delete();

        if (!$delete) abort('500', 'Error delete');

        return response()->json("Successfully in delete $snack->name");
    }
}
