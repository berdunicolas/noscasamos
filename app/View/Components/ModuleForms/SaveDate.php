<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveDate extends Component
{
    public string $id = ModuleTypeEnum::SAVE_DATE['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::SAVE_DATE['name'],
    ) {
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['text_button'] = $module['text_button'] ?? '';
        $this->module['is_countdown'] = $module['is_countdown'] ?? false;
        $this->module['days_tanslation'] = $module['days_tanslation'] ?? '';
        $this->module['hr_tanslation'] = $module['hr_tanslation'] ?? '';
        $this->module['min_translation'] = $module['min_translation'] ?? '';
        $this->module['sec_translation'] = $module['sec_translation'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.save-date');
    }
}
