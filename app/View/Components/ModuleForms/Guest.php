<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Guest extends Component
{
    public string $id = ModuleTypeEnum::GUEST['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::GUEST['name'],
    ) {
        $this->module['tittle'] = (isset($this->module['tittle'])) ? $module['tittle'] : '';
        $this->module['icon'] = (isset($this->module['icon'])) ? $module['icon'] : '';
        $this->module['signs'] = (isset($this->module['signs'])) ? $module['signs'] : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.guest');
    }
}
