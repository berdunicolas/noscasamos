<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
use Carbon\Carbon;
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

        Carbon::setLocale('es');

        /*
        $date = (!empty($this->events['civil']['date'])) ? $this->events['civil']['date'] : $module->invitation->date;
        $date = Carbon::parse($date);
        $this->events['civil']['day'] = $date->day;
        $this->events['civil']['month'] = $date->translatedFormat('F');
        
        $date = (!empty($this->events['ceremony']['date'])) ? $this->events['ceremony']['date'] : $module->invitation->date;
        $date = Carbon::parse($date);
        $this->events['ceremony']['day'] = $date->day;
        $this->events['ceremony']['month'] = $date->translatedFormat('F');
        
        $date = (!empty($this->events['party']['date'])) ? $this->events['party']['date'] : $module->invitation->date;
        $date = Carbon::parse($date);
        $this->events['party']['day'] = $date->day;
        $this->events['party']['month'] = $date->translatedFormat('F');*/

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.events');
    }
}
