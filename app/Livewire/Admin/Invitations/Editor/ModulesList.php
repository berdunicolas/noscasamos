<?php

namespace App\Livewire\Admin\Invitations\Editor;

use App\Models\Invitation;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ModulesList extends Component
{
    public Collection $modules;
    public Invitation $invitation;

    protected $listeners = ['newModuleAdded' => 'reloadData'];

    public function mount(Invitation $invitation, Collection $modules){
        $this->invitation = $invitation;
        $this->modules = $modules;
    }

    public function reloadData()
    {
        $this->modules = $this->invitation->modules()->orderBy('index')->get();
    }

    public function render()
    {
        return view('livewire.admin.invitations.editor.modules-list');
    }
}
