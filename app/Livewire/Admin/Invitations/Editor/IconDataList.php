<?php

namespace App\Livewire\Admin\Invitations\Editor;

use App\Models\Icon;
use App\Models\Invitation;
use App\Models\Template;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class IconDataList extends Component
{
    public Collection $icons;
    public null|Invitation|Template $model;

    protected $listeners = ['verifyIconsType' => 'realoadData'];

    public function mount(null|Invitation|Template $model) {
        $this->model = $model;
        $this->icons = Icon::orderBy('icon_type')->get();
    }

    public function reloadData(){
        $this->model = $this->model->refresh();
        $this->icons = Icon::where('icon_type', $this->model->icon_type)->get();
    }

    public function render()
    {
        return view('livewire.admin.invitations.editor.icon-data-list', [
            'icons' => $this->icons, 
        ]);
    }
}