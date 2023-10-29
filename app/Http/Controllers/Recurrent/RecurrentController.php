<?php

namespace App\Http\Controllers\Recurrent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Snack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecurrentController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders as o')
            ->join('snacks as s', 's.id', '=','o.snack_id')
            ->join('categories as c', 'c.id', '=','s.category_id')
            ->where('o.user_id', '=', Auth::user()->id)
            ->where('o.recurrent', '=', 1)
            ->selectRaw("
                s.name as snack,
                o.id as order_id,
                c.title as category,
                c.id as category_id
            ")
            ->orderBy('s.category_id', 'asc')
            ->get();

        $ordersByCategory = [];
        foreach ($orders as $order) {
            $ordersByCategory[$order->category_id]['title'] = $order->category;
            $ordersByCategory[$order->category_id]['orders'][] = [
                'id' => $order->order_id,
                'title' => $order->snack,
            ];
        }

        return view('recurrent.index')->with('orders', $ordersByCategory);
    }

    public function update(Order $order)
    {
        $order->update([
           'recurrent' => 0
        ]);

        return to_route('recurrent.index');
    }
}
