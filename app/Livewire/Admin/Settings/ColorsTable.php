<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ColorsTable extends Component
{
    public Collection $colors;

    protected $listeners = ['updateColorsTable' => 'reloadData'];

    public function mount() {
        $this->colors = Color::get();
    }

    public function reloadData() {
        $this->colors = Color::get();
    }

    public function render()
    {
        return view('livewire.admin.settings.colors-table', ['colors' => $this->colors]);
    }
}