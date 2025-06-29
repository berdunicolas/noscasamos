<?php

namespace App\Livewire\Table;

use App\Models\Event;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NewInvitationByEventModal extends Component
{
    public Collection $events;
    public Collection $sellers;

    protected $listeners = ['newEvent' => 'reloadData'];

    public function mount(){
        $this->events = Event::where('name', '!=', 'Invitaciones Legacy')->get();
        $this->sellers = Seller::get();
    }

    public function reloadData(){
        $this->events->refresh();
    }

    public function render()
    {
        return view('livewire.table.new-invitation-by-event-modal');
    }
}