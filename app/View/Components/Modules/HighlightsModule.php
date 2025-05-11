<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HighlightsModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module,
    )
    {
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
        $this->module['image'] = $module['image'] ?? '';
        $this->module['button_icon'] = $module['button_icon'] ?? '';
        $this->module['button_text'] = $module['button_text'] ?? '';
        $this->module['button_url'] = $module['image'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.highlights');
    }
}
