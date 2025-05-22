<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Highlights extends Component
{
    public string $id = ModuleTypeEnum::HIGHLIGHTS['display_name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::HIGHLIGHTS['name'],
    ) {
        if($this->module['display_name'] != ModuleTypeEnum::HIGHLIGHTS['display_name']){
            $this->id = $this->module['display_name'] . '-module-form';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.highlights');
    }
}
