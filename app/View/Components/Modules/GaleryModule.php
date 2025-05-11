<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GaleryModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module,
    ) {
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['pre_tittle'] = $module['pre_tittle'] ?? '';
        $this->module['galery_images'] = $module['galery_images'] ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.galery');
    }
}
