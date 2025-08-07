<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Icon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IconsTable extends Component
{
    public Collection $icons;

    protected $listeners = ['updateIconsTable' => 'reloadData'];

    public function mount() {
        $this->icons = Icon::get();
    }

    public function reloadData() {
        $this->icons = Icon::get();
    }

    public function render()
    {
        return view('livewire.admin.settings.icons-table', ['icons' => $this->icons]);
    }
}
