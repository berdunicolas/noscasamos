<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SuggestionsModule extends Component
{
    public array $suggestions = [];
    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module,
        public ?string $style,
        public ?string $color,
        public ?string $icontype,
        public ?string $marco,
        public ?string $padding,
    )
    {
        if(empty($module->data['suggestions'])){
            for ($i=1; $i <= 8; $i++) { 
                $this->suggestions[] = ['suggestion_' . $i => '', 'link_' . $i => ''];
            }
        }else{
            $this->suggestions = $module->data['suggestions'];
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
