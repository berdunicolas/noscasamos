<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Intro extends Component
{

    public string $id = ModuleTypeEnum::INTRO['name'] . '-module-form';
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public string $moduleName = ModuleTypeEnum::INTRO['name'],
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.intro');
    }
}
