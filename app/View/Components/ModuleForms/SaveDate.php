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
        public string $icontype = 'Animado',
        public string $moduleName = ModuleTypeEnum::SAVE_DATE['name'],
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.save-date');
    }
}
