<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Interactive extends Component
{
    public string $id = ModuleTypeEnum::INTERACTIVE['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::INTERACTIVE['name'],
    ) {
        $this->module['spotify'] = $module['spotify'] ?? [];
        $this->module['spotify']['active'] = $module['spotify']['active'] ?? false;
        $this->module['spotify']['icon'] = $module['spotify']['icon'] ?? '';
        $this->module['spotify']['order'] = $module['spotify']['order'] ?? '';
        $this->module['spotify']['tittle'] = $module['spotify']['tittle'] ?? '';
        $this->module['spotify']['text'] = $module['spotify']['text'] ?? '';
        $this->module['spotify']['button_icon'] = $module['spotify']['button_icon'] ?? '';
        $this->module['spotify']['button_text'] = $module['spotify']['button_text'] ?? '';
        $this->module['spotify']['button_url'] = $module['spotify']['button_url'] ?? '';
        $this->module['hashtag'] = $module['hashtag'] ?? [];
        $this->module['hashtag']['active'] = $module['hashtag']['active'] ?? false;
        $this->module['hashtag']['icon'] = $module['hashtag']['icon'] ?? '';
        $this->module['hashtag']['order'] = $module['hashtag']['order'] ?? '';
        $this->module['hashtag']['tittle'] = $module['hashtag']['tittle'] ?? '';
        $this->module['hashtag']['text'] = $module['hashtag']['text'] ?? '';
        $this->module['hashtag']['button_icon'] = $module['hashtag']['button_icon'] ?? '';
        $this->module['hashtag']['button_text'] = $module['hashtag']['button_text'] ?? '';
        $this->module['hashtag']['button_url'] = $module['hashtag']['button_url'] ?? '';
        $this->module['ig'] = $module['ig'] ?? [];
        $this->module['ig']['active'] = $module['ig']['active'] ?? false;
        $this->module['ig']['icon'] = $module['ig']['icon'] ?? '';
        $this->module['ig']['order'] = $module['ig']['order'] ?? '';
        $this->module['ig']['tittle'] = $module['ig']['tittle'] ?? '';
        $this->module['ig']['text'] = $module['ig']['text'] ?? '';
        $this->module['ig']['button_icon'] = $module['ig']['button_icon'] ?? '';
        $this->module['ig']['button_text'] = $module['ig']['button_text'] ?? '';
        $this->module['ig']['button_url'] = $module['ig']['button_url'] ?? '';
        $this->module['link'] = $module['link'] ?? [];
        $this->module['link']['active'] = $module['link']['active'] ?? false;
        $this->module['link']['icon'] = $module['link']['icon'] ?? '';
        $this->module['link']['order'] = $module['link']['order'] ?? '';
        $this->module['link']['tittle'] = $module['link']['tittle'] ?? '';
        $this->module['link']['text'] = $module['link']['text'] ?? '';
        $this->module['link']['button_icon'] = $module['link']['button_icon'] ?? '';
        $this->module['link']['button_text'] = $module['link']['button_text'] ?? '';
        $this->module['link']['button_url'] = $module['link']['button_url'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.interactive');
    }
}
