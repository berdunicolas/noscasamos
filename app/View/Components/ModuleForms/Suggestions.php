<?php

namespace App\View\Components\ModuleForms;

use App\Models\Module;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Suggestions extends Component
{
    public string $action = '';
    public array $suggestions = [];
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Module $module
    ) {
        if(empty($module->data['suggestions'])){
            for ($i=1; $i <= 12; $i++) { 
                $this->suggestions[] = ['suggestion_' . $i => '', 'link_' . $i => ''];
            }
        }else{
            $this->suggestions = $module->data['suggestions'];
        }

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
        return view('components.module-forms.suggestions');
    }
}
