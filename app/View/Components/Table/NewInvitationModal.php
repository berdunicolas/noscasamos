<?php

namespace App\View\Components\Table;

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewInvitationModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $eventTypes = EventTypeEnum::values();
        $planTypes = PlanTypeEnum::values();

        return view('components.table.new-invitation-modal', [
            'eventTypes' => $eventTypes,
            'planTypes' => $planTypes,            
        ]);
    }
}
