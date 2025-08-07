<?php

namespace App\View\Components\Form;

use App\Models\Color;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ColorPicker extends Component
{
    public Collection $colors;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label = '',
        public string $value = '#C9AD7C',
    ) {
        $this->colors = Color::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.color-picker');
    }
}
