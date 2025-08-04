<?php

namespace App\View\Components\ModuleForms;

use App\Models\Module;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Gifts extends Component
{
    public string $action = '';
    public bool $isInvitation = true;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Module $module
    ) {
        if(get_class($module) == 'App\Models\TemplateModule'){
            $this->action = route('api.template.modules.update', ['template' => $module->template_id, 'module' => $module->id]);
            $this->isInvitation = false;
        } else {
            $this->action = route('api.invitation.modules.update', ['invitation' => $module->invitation_id, 'module' => $module->id]);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.gifts');
    }
}
