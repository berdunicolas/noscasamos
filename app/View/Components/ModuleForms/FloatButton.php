<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use App\Models\Module;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FloatButton extends Component
{
    public string $action = '';
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Module $module
    ) {
        if(get_class($module) == 'App\Models\TemplateModule'){
            $this->action = route('api.template.modules.update', ['template' => $module->template_id, 'module' => $module->id]);
        } else {
            $this->action = route('api.invitation.modules.update', ['invitation' => $module->invitation_id, 'module' => $module->id]);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.float-button');
    }
}
