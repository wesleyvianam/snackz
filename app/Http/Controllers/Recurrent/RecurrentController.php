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
        $orders = Auth::user()->super
            ? $this->getAllOrdersRecurrent()
            : $this->getOrdersRecurrentByUser();

        return view('recurrent.index')->with('orders', $orders);
    }

    public function update(Order $order)
    {
        $order->update([
           'recurrent' => 0
        ]);

        return to_route('recurrent.index');
    }

    private function getAllOrdersRecurrent()
    {
        $orders = DB::table('orders as o')
            ->join('snacks as s', 's.id', '=','o.snack_id')
            ->join('categories as c', 'c.id', '=','s.category_id')
            ->join('users as u', 'u.id', '=','o.user_id')
            ->where('o.recurrent', '=', 1)
            ->where('o.workspace_id', '=', Auth::user()->workspace_id)
            ->selectRaw("
                s.name as snack,
                o.id as order_id,
                c.title as category,
                c.id as category_id,
                u.id as user_id,
                u.name as username,
                o.quantity as quantity
            ")
            ->orderBy('s.category_id', 'asc')
            ->get();

        return $this->hydrateDate($orders);
    }

    private function getOrdersRecurrentByUser()
    {
        $orders = DB::table('orders as o')
            ->join('snacks as s', 's.id', '=','o.snack_id')
            ->join('categories as c', 'c.id', '=','s.category_id')
            ->join('users as u', 'u.id', '=','o.user_id')
            ->where('o.user_id', '=', Auth::user()->id)
            ->where('o.recurrent', '=', 1)
            ->selectRaw("
                s.name as snack,
                o.id as order_id,
                c.title as category,
                c.id as category_id,
                u.id as user_id,
                u.name as username,
                o.quantity as quantity
            ")
            ->orderBy('s.category_id', 'asc')
            ->get();

        return $this->hydrateDate($orders);
    }

    private function hydrateDate($ordersRecurrent)
    {
        $ordersByUser = [];
        foreach ($ordersRecurrent as $order) {
            $ordersByUser[$order->user_id]['title'] = $order->username;
            $ordersByUser[$order->user_id]['orders'][] = [
                'id' => $order->order_id,
                'title' => $order->snack,
                'category' => $order->category,
                'quantity' => $order->quantity,
            ];
        }

        return $ordersByUser;
    }
}
