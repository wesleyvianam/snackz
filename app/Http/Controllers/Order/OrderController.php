<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $order = [];
            foreach ($request->snack_id as $snack) {
                $order[] = Order::create([
                    'snack_id' => $snack,
                    'member_id' => $request->member,
                ]);

                if ($request->recurrent) {

                }
            }

        });
    }
}
