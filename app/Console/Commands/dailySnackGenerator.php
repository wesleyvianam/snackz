<?php

namespace App\Console\Commands;

use App\Http\Controllers\User\RecoverController;
use App\Mail\Recover;
use App\Models\Member;
use App\Models\Order;
use App\Models\SnackTemplate;
use App\Models\Workspace;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
    public function handle()
    {
        $agora = Date::now();
        $horaAtual = $agora->format('H:i');
        $horaFutura = $agora->addMinutes(30)->format('H:i');

        $workspaces = Workspace::whereBetween(DB::raw("TIME(snack_time)"), [$horaAtual, $horaFutura])->get();

        $workspaceIds = [];
        foreach ($workspaces as $workspace) {
            $workspaceIds[] = $workspace->id;
        }

        $dataAtual = Carbon::now()->format('Y-m-d');

        $membrosSemPedidosHoje = Member::whereIn('workspace_id', $workspaceIds)
            ->whereDoesntHave('orders', function ($query) use ($dataAtual) {
                $query->whereDate('created_at', $dataAtual);
            })
            ->whereHas('snackTemplates')
            ->get();

        $membersId = [];
        foreach ($membrosSemPedidosHoje as $member) {
            $membersId[] = $member->id;
        }

        $templates = SnackTemplate::whereIn('member_id', $membersId)->get();

        DB::transaction(function () use($templates) {
            foreach ($templates as $template) {
                Order::create([
                    'snack_id' => $template->snack_id,
                    'member_id' => $template->member_id,
                ]);
            }
        });
    }
}
