<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmationModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module = [],
        public string $typeIcon,

    ) {
         $this->module['icon'] = $module['icon'] ?? '';
        $this->module['pre_tittle'] = $module['pre_tittle'] ?? '';
        $this->module['tittle'] = $module['tittle'] ?? '';
        $this->module['text'] = $module['text'] ?? '';
        $this->module['limit_date'] = $module['limit_date'] ?? '';
        $this->module['card_active'] = $module['card_active'] ?? false;
        $this->module['card_tittle'] = $module['card_tittle'] ?? '';
        $this->module['card_text'] = $module['card_text'] ?? '';
        $this->module['card_button_text'] = $module['card_button_text'] ?? '';

        $this->module['form_active'] = $module['form_active'] ?? false;
        $this->module['form_button_text'] = $module['form_button_text'] ?? '';
        $this->module['form_button_url'] = $module['form_button_url'] ?? '';
        $this->module['form_text'] = $module['form_text'] ?? '';
        $this->module['form_ill_attend'] = $module['form_ill_attend'] ?? '';
        $this->module['form_ill_n_attend'] = $module['form_ill_n_attend'] ?? '';
        $this->module['form_name'] = $module['form_name'] ?? '';
        $this->module['form_email'] = $module['form_email'] ?? '';
        $this->module['form_phone'] = $module['form_phone'] ?? '';
        $this->module['form_special_menu'] = $module['form_special_menu'] ?? '';
        $this->module['form_nothing'] = $module['form_nothing'] ?? '';
        $this->module['form_menu1'] = $module['form_menu1'] ?? '';
        $this->module['form_menu2'] = $module['form_menu2'] ?? '';
        $this->module['form_menu3'] = $module['form_menu3'] ?? '';
        $this->module['form_menu4'] = $module['form_menu4'] ?? '';
        $this->module['form_menu5'] = $module['form_menu5'] ?? '';
        $this->module['form_transfer'] = $module['form_transfer'] ?? '';
        $this->module['form_option1'] = $module['form_option1'] ?? '';
        $this->module['form_option2'] = $module['form_option2'] ?? '';
        $this->module['form_option3'] = $module['form_option3'] ?? '';
        $this->module['form_option4'] = $module['form_option4'] ?? '';
        $this->module['form_companions'] = $module['form_companions'] ?? '';
        $this->module['form_comments'] = $module['form_comments'] ?? '';
        $this->module['form_thanks'] = $module['form_thanks'] ?? '';
        $this->module['form_errors'] = $module['form_errors'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.confirmation');
    }
}
