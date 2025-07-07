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


        $this->events['civil']['date'] = (!empty($this->events['civil']['date'])) ? $this->events['civil']['date'] : $module->invitation->date;
        $this->events['ceremony']['date'] = (!empty($this->events['ceremony']['date'])) ? $this->events['ceremony']['date'] : $module->invitation->date;
        $this->events['party']['date'] = (!empty($this->events['party']['date'])) ? $this->events['party']['date'] : $module->invitation->date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.events');
    }
}
