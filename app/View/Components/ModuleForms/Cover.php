<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cover extends Component
{
    public string $id = ModuleTypeEnum::COVER['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public null|string $names = '',
        public string $moduleName = ModuleTypeEnum::COVER['name'],
    ) {
        $this->module['names'] = (isset($this->module['names'])) ? $module['names'] : $names;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.cover');
    }
}
