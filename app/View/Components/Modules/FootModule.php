<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FootModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module,
    ) {
        $module->load(['invitation', 'invitation.seller']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.foot');
    }
}
