<?php

namespace App\Livewire\Admin\Invitations\Editor;

use App\Models\Invitation;
use App\Models\Template;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ModulesList extends Component
{
    public Collection $modules;
    public Invitation|Template $moduleOwner;

    protected $listeners = ['newModuleAdded' => 'reloadData'];

    public function mount(Invitation|Template $moduleOwner, Collection $modules){
        $this->moduleOwner = $moduleOwner;
        $this->modules = $modules;
    }

    public function reloadData()
    {
        $this->modules = $this->moduleOwner->modules()->orderBy('index')->get();
    }

    public function render()
    {
        return view('livewire.admin.invitations.editor.modules-list');
    }
}
