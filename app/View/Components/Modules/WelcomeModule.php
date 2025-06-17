<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WelcomeModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module,
        public ?string $icontype,
        public ?string $style,
        public ?string $color,
    )
    {
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
        $this->module['image'] = $module['image'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.welcome');
    }
}
