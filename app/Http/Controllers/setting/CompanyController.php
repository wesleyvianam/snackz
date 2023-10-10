<?php

namespace App\Http\Controllers\setting;

use App\Models\Workspace;
use Illuminate\Http\Request;

class CompanyController
{
    public function store(Request $request)
    {
        $name = $request->name;

        if ($name) {
            $workspace = Workspace::create([
                'name' => $name
            ]);
        }

        return response()->json($workspace ?? []);
    }
}
