<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Events extends Component
{
    public string $id = ModuleTypeEnum::EVENTS['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::EVENTS['name'],
    ) {
        $this->module['civil'] = $module['civil'] ?? [];
        $this->module['civil']['active'] = $module['civil']['active'] ?? false;
        $this->module['civil']['event'] = $module['civil']['event'] ?? false;
        $this->module['civil']['icon'] = $module['civil']['icon'] ?? false;
        $this->module['civil']['order'] = $module['civil']['order'] ?? false;
        $this->module['civil']['date'] = $module['civil']['date'] ?? false;
        $this->module['civil']['time'] = $module['civil']['time'] ?? false;
        $this->module['civil']['hr_translation'] = $module['civil']['hr_translation'] ?? false;
        $this->module['civil']['name'] = $module['civil']['name'] ?? false;
        $this->module['civil']['detail'] = $module['civil']['detail'] ?? false;
        $this->module['civil']['button_url'] = $module['civil']['button_url'] ?? false;
        $this->module['civil']['button_text'] = $module['civil']['button_text'] ?? false;

        $this->module['ceremony'] = $module['ceremony'] ?? [];
        $this->module['ceremony']['active'] = $module['ceremony']['active'] ?? false;
        $this->module['ceremony']['event'] = $module['ceremony']['event'] ?? false;
        $this->module['ceremony']['icon'] = $module['ceremony']['icon'] ?? false;
        $this->module['ceremony']['order'] = $module['ceremony']['order'] ?? false;
        $this->module['ceremony']['date'] = $module['ceremony']['date'] ?? false;
        $this->module['ceremony']['time'] = $module['ceremony']['time'] ?? false;
        $this->module['ceremony']['hr_translation'] = $module['ceremony']['hr_translation'] ?? false;
        $this->module['ceremony']['name'] = $module['ceremony']['name'] ?? false;
        $this->module['ceremony']['detail'] = $module['ceremony']['detail'] ?? false;
        $this->module['ceremony']['button_url'] = $module['ceremony']['button_url'] ?? false;
        $this->module['ceremony']['button_text'] = $module['ceremony']['button_text'] ?? false;

        $this->module['party'] = $module['party'] ?? [];
        $this->module['party']['active'] = $module['party']['active'] ?? false;
        $this->module['party']['event'] = $module['party']['event'] ?? false;
        $this->module['party']['icon'] = $module['party']['icon'] ?? false;
        $this->module['party']['order'] = $module['party']['order'] ?? false;
        $this->module['party']['date'] = $module['party']['date'] ?? false;
        $this->module['party']['time'] = $module['party']['time'] ?? false;
        $this->module['party']['hr_translation'] = $module['party']['hr_translation'] ?? false;
        $this->module['party']['name'] = $module['party']['name'] ?? false;
        $this->module['party']['detail'] = $module['party']['detail'] ?? false;
        $this->module['party']['button_url'] = $module['party']['button_url'] ?? false;
        $this->module['party']['button_text'] = $module['party']['button_text'] ?? false;

        $this->module['dresscode'] = $module['dresscode'] ?? [];
        $this->module['dresscode']['active'] = $module['dresscode']['active'] ?? false;
        $this->module['dresscode']['event'] = $module['dresscode']['event'] ?? false;
        $this->module['dresscode']['icon'] = $module['dresscode']['icon'] ?? false;
        $this->module['dresscode']['order'] = $module['dresscode']['order'] ?? false;
        $this->module['dresscode']['name'] = $module['dresscode']['name'] ?? false;
        $this->module['dresscode']['detail'] = $module['dresscode']['detail'] ?? false;
        $this->module['dresscode']['button_url'] = $module['dresscode']['button_url'] ?? false;
        $this->module['dresscode']['button_text'] = $module['dresscode']['button_text'] ?? false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.events');
    }
}
