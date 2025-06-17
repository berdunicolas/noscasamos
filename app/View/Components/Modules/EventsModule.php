<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventsModule extends Component
{
    public array $events;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module,
        public ?string $icontype,
        public ?string $style,
        public ?string $color,
        public ?string $marco,
        public ?string $padding,
    ) {
        $this->events = $module->data;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.events');
    }
}
