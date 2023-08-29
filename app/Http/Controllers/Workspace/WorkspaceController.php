<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspace = $this->getWorkspace();

        return response()->json($workspace);
    }

    public function update(Workspace $workspace, Request $request)
    {
        $workspace->update([
            "name" => $request->name
        ]);

        return response()->json($workspace);
    }
}
