<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cover extends Component
{
    public string $id = ModuleTypeEnum::COVER['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::COVER['name'],
    ) {
        $this->module['format'] = (isset($this->module['format'])) ? $module['format'] : '';
        $this->module['frame_type'] = (isset($this->module['frame_type'])) ? $module['frame_type'] : '';
        $this->module['align'] = (isset($this->module['align'])) ? $module['align'] : '';
        $this->module['tittle'] = (isset($this->module['tittle'])) ? $module['tittle'] : '';
        $this->module['detail'] = (isset($this->module['detail'])) ? $module['detail'] : '';
        $this->module['text_color_cover'] = (isset($this->module['text_color_cover'])) ? $module['text_color_cover'] : '';

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.cover');
    }
}
