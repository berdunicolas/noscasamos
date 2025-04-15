<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $id = '',
        public string $placeholder = '',
        public string $label = '',
        public string $value = '',
        public string $type = 'text',
        public string $labelClasses = '',
        public string $inputClasses = '',
        public array $errors = [],
        public string $extraAttributes = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}