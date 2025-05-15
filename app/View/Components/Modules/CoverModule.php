<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoverModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module,
        public string $nombres,
        public string $principalColor,
        public string $backgroundColor,

    ) {
        $this->module['names'] = (isset($this->module['names'])) ? $module['names'] : $nombres;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.cover');
    }
}
