<?php

namespace App\View\Components\ModuleForms;

use App\Models\InvitationModule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Events extends Component
{
    public array $events;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module
    ) {
        $this->events = $module->data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.events');
    }
}
