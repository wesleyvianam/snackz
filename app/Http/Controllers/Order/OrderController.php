<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\SnackTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $menu = Category::where('workspace_id', $this->getWorkspaceId())->with('snacks')->get();

       return view('orders.index',compact('menu'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $orders = DB::transaction(function () use ($request, $user) {
            $order = [];
            foreach ($request->snack as $snack) {
                $order[] = Order::create([
                    'snack_id' => $snack['id'],
                    'member_id' => $user->id,
                ]);

                if ($request->recurrent) {
                    SnackTemplate::create([
                        'snack_id' => $snack['id'],
                        'member_id' => $user->id,
                    ]);
                }
            }

            return $order;
        });

        return response()->json($orders);
    }
}
