<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Member;

class ReportsController extends Controller
{
    public function listAll()
    {
        $workspace = $this->getWorkspaceId();

        $orders = Member::where('workspace_id', $workspace->id)
            ->with('orders.snack')->get();
        return response()->json($orders);
    }
}
