<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use App\Models\Seller;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Foot extends Component
{
    public string $id = ModuleTypeEnum::FOOT['name'] . '-module-form';
    public $sellers;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::FOOT['name'],
    ) {
        $this->module['seller_name'] = $module['seller_name'] ?? '';
        $this->module['foot_text'] = $module['foot_text'] ?? '';

        $this->sellers = Seller::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.foot');
    }
}
