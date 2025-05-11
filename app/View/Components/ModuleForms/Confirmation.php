<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Confirmation extends Component
{
    public string $id = ModuleTypeEnum::CONFIRMATION['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::CONFIRMATION['name'],
    ) {
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['pre_tittle'] = $module['pre_tittle'] ?? '';
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
        $this->module['limit_date'] = $module['limit_date'] ?? '';
        $this->module['form']['active'] = $module['form']['active'] ?? false;
        $this->module['first_button']['active'] = $module['first_button']['active'] ?? false;
        $this->module['second_button']['active'] = $module['second_button']['active'] ?? false;
        $this->module['card_value']['active'] = $module['card_value']['active'] ?? false;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.confirmation');
    }
}
