<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class dailySnackGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-snack-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that generate the daily recurring snacks every 30 minutes.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $date = Carbon::now();
        if (!$date->isWeekday()) return;

        $agora = Date::now();
        $horaAtual = $agora->format('H:i');
        $horaFutura = $agora->addMinutes(30)->format('H:i');

        $workspaces = DB::table('workspace_settings')
            ->where('recurrent', '=', 1)
            ->whereDate('last_wish', '!=', now()->toDateString())
            ->whereBetween('snack_time', [$horaAtual, $horaFutura])
            ->get();

        if (empty($workspaces)) return;

        $workspaceIds = [];
        foreach ($workspaces as $workspace) {
            $workspaceIds[] = $workspace->workspace_id;
        }

        $orders = DB::table('orders as o')
            ->whereIn('o.workspace_id', $workspaceIds)
            ->where('o.recurrent', '=', 1)
            ->get();

        DB::transaction(function () use($orders, $workspaces) {
            foreach ($orders as $order) {
                Order::create([
                    'snack_id' => $order->snack_id,
                    'user_id' => $order->user_id,
                    'workspace_id' => $order->workspace_id,
                    'recurrent' => 0,
                ]);

                foreach ($workspaces as $workspace) {
                    DB::table('workspace_settings')
                        ->where('id', $workspace->workspace_id)
                        ->update(['last_wish' => now()->toDateString()]);
                }
            }
        });
    }
}
