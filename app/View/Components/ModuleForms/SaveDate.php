<?php

namespace App\View\Components\ModuleForms;

use App\Models\InvitationModule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveDate extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.save-date');
    }
}
