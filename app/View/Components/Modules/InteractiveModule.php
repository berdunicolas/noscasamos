<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
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
        public InvitationModule $module,
        public ?string $style,
        public ?string $color,
        public ?string $icontype,
        public ?string $marco,
        public ?string $padding,
    )
    {
        $this->interactives = $module->data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.interactive');
    }
}
