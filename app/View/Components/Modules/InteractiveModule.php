<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InteractiveModule extends Component
{
    public array $interactives;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module
    )
    {
        $this->interactives = $module['interactives'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.interactive');
    }
}
