<?php

namespace App\Console\Commands;

use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DisableInvitations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:disable-invitations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desactiva las invitaciones que tengan un dia de vencimiento';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $yesterday = Carbon::now()->subDay()->format('Y-m-d');
        Invitation::where('date', $yesterday)
            ->where('was_disabled', false)
            ->update([
                'active' => false,
                'was_disabled' => true,
            ]);
    }
}
