<?php

namespace App\View\Components\ModuleForms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public int $moduleId,
        public string $moduleType = '',
        public string $moduleName = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.form');
    }
}
