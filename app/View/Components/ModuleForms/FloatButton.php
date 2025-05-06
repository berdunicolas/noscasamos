<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FloatButton extends Component
{
    public string $id = ModuleTypeEnum::FLOAT_BUTTON['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::FLOAT_BUTTON['name'],
    ) {
        $this->module['type_button'] = (isset($this->module['type_button'])) ? $module['type_button'] : '';
        $this->module['url_button'] = (isset($this->module['url_button'])) ? $module['url_button'] : '';
        $this->module['icon_button'] = (isset($this->module['icon_button'])) ? $module['icon_button'] : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.float-button');
    }
}
