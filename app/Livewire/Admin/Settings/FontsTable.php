<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Font;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FontsTable extends Component
{
    public Collection $fonts;

    protected $listeners = ['updateFontsTable' => 'reloadData'];

    public function mount() {
        $this->fonts = Font::get();
    }

    public function reloadData() {
        $this->fonts = Font::get();
    }

    public function render()
    {
        return view('livewire.admin.settings.fonts-table', ['fonts' => $this->fonts]);
    }
}