<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Highlights extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id = ModuleTypeEnum::HIGHLIGHTS['name'] . '-module-form',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.highlights');
    }
}
