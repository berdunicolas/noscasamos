<?php

namespace App\Livewire\Admin\Invitations\Editor;

use App\Models\Invitation;
use App\Models\InvitationLog;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Logs extends Component
{
    public ?Collection $logs = null;
    public int $invitation;

    protected $listeners = ['updatedInvitationLogs' => 'reloadData'];

    public function mount(int $invitation){
        $this->invitation = $invitation;
    }

    public function reloadData()
    {
        $this->logs = InvitationLog::where('invitation_id', $this->invitation)->get();
    }


    public function render()
    {
        return view('livewire.admin.invitations.editor.logs', ['logs' => $this->logs]);
    }
}
