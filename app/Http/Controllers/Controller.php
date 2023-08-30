<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Workspace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Driver\WriteOperationFailedException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getWorkspace()
    {

        $member = Member::where('user_id', Auth::user()->id)->get();

        $workspace = Workspace::where('id', $member[0]->workspace_id)->get();

        return $workspace[0];
    }
}
