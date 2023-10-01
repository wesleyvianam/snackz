<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class WorkspaceController extends Controller
{
    public function update(Workspace $workspace, Request $request): RedirectResponse
    {
        $workspace->update([
            "name" => $request->name,
            "recurrent" => $request->recurrent,
            "snack_time" => $request->snack_time
        ]);

        return to_route('');
    }
}
