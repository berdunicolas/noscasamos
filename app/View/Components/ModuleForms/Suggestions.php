<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Suggestions extends Component
{
    public string $id = ModuleTypeEnum::SUGGESTIONS['name'] . '-module-form';
    public array $module;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        array $module,
        public string $moduleName = ModuleTypeEnum::SUGGESTIONS['name'],
    ) {
        $this->module['pre_tittle'] = $module['pre_tittle'] ?? '';
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
        $this->module['icon'] = $module['icon'] ?? '';

        if(empty($module['suggestions'])){
            for ($i=1; $i <= 8; $i++) { 
                $this->module['suggestions'][] = ['suggestion_' . $i => '', 'link_' . $i => ''];
            }
        }else{
            $this->module['suggestions'] = $module['suggestions'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.suggestions');
    }
}
