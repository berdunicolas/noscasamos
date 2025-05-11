<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class History extends Component
{
    public string $id = ModuleTypeEnum::HISTORY['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::HISTORY['name'],
    ) {
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['image'] = $module['image'] ?? '';
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
        $this->module['button_icon'] = $module['button_icon'] ?? '';
        $this->module['button_text'] = $module['button_text'] ?? '';
        $this->module['button_url'] = $module['button_url'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.history');
    }
}
