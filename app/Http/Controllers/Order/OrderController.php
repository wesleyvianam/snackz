<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Member;
use App\Models\Order;
use App\Models\SnackTemplate;
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
            ->join('members as m', 'm.id', '=','o.member_id')
            ->join('snacks as s', 's.id', '=','o.snack_id')
            ->join('categories as c', 'c.id', '=','s.category_id')
            ->where('o.workspace_id', '=', $this->getWorkspaceId())
            ->selectRaw("
                m.name as member,
                m.id as member_id,
                s.name as snack,
                s.id as snack_id,
                c.title as category,
                c.id as category_id
            ")
            ->get();

        $ordersDetails = [];
        foreach ($orders as $order) {
            $ordersDetails[$order->member_id]['name'] = $order->member;
            $ordersDetails[$order->member_id]['snack'][] = $order->snack;
        }

        $ordersResume = [];
        foreach ($orders as $order) {
            $ordersResume[$order->category_id]['title'] = $order->category;

            empty($ordersResume[$order->category_id]['snack'][$order->snack_id])
                ? $ordersResume[$order->category_id]['snack'][$order->snack_id]['qtd'] = 1
                : $ordersResume[$order->category_id]['snack'][$order->snack_id]['qtd'] += 1;

            $ordersResume[$order->category_id]['snack'][$order->snack_id]['title'] = $order->snack;
        }

        return view('orders.index', compact(
            'categories',
            'ordersDetails',
            'ordersResume'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $member = Member::where('user_id', Auth::user()->id)->get();
        $workspaceId = $this->getWorkspaceId();

        $values = [];
        foreach ($request->request as $key => $snack) {
            if ($key != '_token' && $key != 'recurrent') {
                $values[] = $snack;
            }
        }

        DB::transaction(function () use ($request, $member, $values, $workspaceId) {
            foreach ($values as $snack) {
                Order::create([
                    'snack_id' => $snack,
                    'member_id' => $member[0]->id,
                    'workspace_id' => $workspaceId
                ]);

                if ($request->recurrent) {
                    SnackTemplate::create([
                        'snack_id' => $snack,
                        'member_id' => $member[0]->id,
                        'workspace_id' => $workspaceId
                    ]);
                }
            }
        });

        return to_route('home.index');
    }
}
