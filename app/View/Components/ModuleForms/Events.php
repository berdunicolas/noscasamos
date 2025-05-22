<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Events extends Component
{
    public string $id = ModuleTypeEnum::EVENTS['display_name'] . '-module-form';
    public array $events;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::EVENTS['name'],
    ) {
        $this->events = $module['events'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.events');
    }
}
