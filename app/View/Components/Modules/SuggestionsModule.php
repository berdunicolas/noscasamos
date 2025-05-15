<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SuggestionsModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
    public array $module,
    )
    {
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
        return view('invitations.modules.suggestions');
    }
}
