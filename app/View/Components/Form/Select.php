<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $id = '',
        public string $ariaLabel = '',
        public string $label = '',
        public string $value = '',
        public string $labelClasses = '',
        public string $selectClasses = '',
        public bool $disabled = false,
        public string $extraAttributes = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
