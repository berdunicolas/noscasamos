<?php

namespace App\Livewire\Admin\Invitations\Editor;

use App\Models\Icon;
use App\Models\Invitation;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IconDataList extends Component
{
    public Collection $icons;
    public Invitation $invitation;

    protected $listeners = ['verifyIconsType' => 'realoadData'];

    public function mount(Invitation $invitation) {
        $this->invitation = $invitation;
        $this->icons = Icon::orderBy('icon_type')->get();
    }

    public function reloadData(){
        $this->invitation = $this->invitation->refresh();
        $this->icons = Icon::where('icon_type', $this->invitation->icon_type)->get();
    }

    public function render()
    {
        return view('livewire.admin.invitations.editor.icon-data-list', [
            'icons' => $this->icons, 
        ]);
    }
}