<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectOption extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $value,
        public string $label,
        public bool $selected = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-option');
    }
}
