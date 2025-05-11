<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Video extends Component
{
    public string $id = ModuleTypeEnum::VIDEO['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::VIDEO['name'],
    ) {
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
        return view('components.module-forms.video');
    }
}
