<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VideoModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module,
    )
    {
        $this->module['icon'] = $module['icon'] ?? '';
        $this->module['pre_tittle'] = $module['pre_tittle'] ?? '';
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['video_id'] = $module['video_id'] ?? '';
        $this->module['type_video'] = $module['type_video'] ?? '';
        $this->module['format'] = $module['format'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.video');
    }
}
