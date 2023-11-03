<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $categories = Category::where('workspace_id', $this->getWorkspaceId())->with('snacks')->get();

        $orders = DB::table('orders as o')
            ->join('users as m', 'm.id', '=','o.user_id')
            ->join('snacks as s', 's.id', '=','o.snack_id')
            ->join('categories as c', 'c.id', '=','s.category_id')
            ->where('o.workspace_id', '=', $this->getWorkspaceId())
            ->whereDate('o.created_at', '=',  now()->toDateString())
            ->selectRaw("
                m.name as user,
                m.id as user_id,
                s.name as snack,
                s.id as snack_id,
                c.title as category,
                c.id as category_id,
                o.id as order_id,
                o.quantity as quantity
            ")
            ->get();

        $ordersDetails = [];
        foreach ($orders as $order) {
            $ordersDetails[$order->user_id]['name'] = $order->user;
            $ordersDetails[$order->user_id]['order'][$order->order_id]['snack'] = $order->snack;
            $ordersDetails[$order->user_id]['order'][$order->order_id]['quantity'] = $order->quantity;
            $ordersDetails[$order->user_id]['order'][$order->order_id]['order_id'] = $order->order_id;
        }

        $ordersResume = [];
        foreach ($orders as $order) {
            $ordersResume[$order->category_id]['title'] = $order->category;

            empty($ordersResume[$order->category_id]['snack'][$order->snack_id])
                ? $ordersResume[$order->category_id]['snack'][$order->snack_id]['qtd'] = $order->quantity
                : $ordersResume[$order->category_id]['snack'][$order->snack_id]['qtd'] += $order->quantity;

            $ordersResume[$order->category_id]['snack'][$order->snack_id]['title'] = $order->snack;
        }

        return view('orders.index', compact(
            'categories',
            'ordersDetails',
            'ordersResume',
            'orders'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $recurrent = 0;

        $orders = [];
        foreach ($request->request as $key => $snacks) {
            if ($key == 'recurrent') {
                $recurrent = 1;
                continue;
            }

            if ($key != '_token') {
                foreach ($snacks as $cat => $snack) {
                    $cat == "quantity"
                        ? $orders[$key]['quantity'] = $snack
                        : $orders[$key]['id'] = $snack;
                }
            }
        }

        DB::transaction(function () use ($recurrent, $user, $orders) {
            foreach ($orders as $order) {
                if (isset($order['id'])) {
                    Order::create([
                        'snack_id' => $order['id'],
                        'user_id' => $user->id,
                        'workspace_id' => $user->workspace_id,
                        'recurrent' => $recurrent,
                        'quantity' => $order['quantity'] ?? 1
                    ]);
                }
            }
        });

        return to_route('home.index');
    }

    public function destroy(Order $order)
    {
//        dd($order);
        $order->delete();


        return to_route('home.index');
    }
}
