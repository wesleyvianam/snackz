<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getWorkspace()
    {
        $workspace = Auth::user()->workspace()->get();

        return $workspace[0];
    }
}
