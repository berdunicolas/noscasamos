<?php

namespace App\Livewire\Admin\Invitations\Editor;

use App\Models\Invitation;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Header extends Component
{
    public Invitation $invitation;
    public Collection $guests;

    protected $listeners = ['updatedInvitation' => 'reloadData'];

    public function mount(Invitation $invitation, Collection $guests)
    {
        $this->invitation = $invitation;
        $this->guests = $guests;
    }

    public function reloadData()
    {
        //$this->invitation = Invitation::find($this->invitacion->id);
        $this->invitation->refresh();
    }

    public function render()
    {
        return view('livewire.admin.invitations.editor.header', [
            'invitation' => $this->invitation,
            'guests' => $this->guests
        ]);
    }
}
