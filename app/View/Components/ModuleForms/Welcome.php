<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Welcome extends Component
{
    public string $id = ModuleTypeEnum::WELCOME['display_name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::WELCOME['name'],
    ) {
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.welcome');
    }
}
