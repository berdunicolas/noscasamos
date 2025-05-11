<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GiftsModule extends Component
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
        $this->module['text'] = $module['text'] ?? '';
        $this->module['background_image'] = $module['background_image'] ?? '';
        $this->module['module_image'] = $module['module_image'] ?? '';
        $this->module['button_icon'] = $module['button_icon'] ?? '';
        $this->module['button_text'] = $module['button_text'] ?? '';
        $this->module['button_type'] = $module['button_type'] ?? '';
        $this->module['button_url'] = $module['button_url'] ?? '';
        $this->module['first_account']['active'] = $module['first_account']['active'] ?? '';
        $this->module['first_account']['tittle'] = $module['first_account']['tittle'] ?? '';
        $this->module['first_account']['text'] = $module['first_account']['text'] ?? '';
        $this->module['first_account']['data'] = $module['first_account']['data'] ?? '';
        $this->module['first_account']['value'] = $module['first_account']['value'] ?? '';
        $this->module['second_account']['active'] = $module['second_account']['active'] ?? '';
        $this->module['second_account']['tittle'] = $module['second_account']['tittle'] ?? '';
        $this->module['second_account']['text'] = $module['second_account']['text'] ?? '';
        $this->module['second_account']['data'] = $module['second_account']['data'] ?? '';
        $this->module['second_account']['value'] = $module['second_account']['value'] ?? '';
        $this->module['box']['active'] = $module['box']['active'] ?? '';
        $this->module['box']['tittle'] = $module['box']['tittle'] ?? '';
        $this->module['box']['text'] = $module['box']['text'] ?? '';
        $this->module['box']['button_text'] = $module['box']['button_text'] ?? '';
        $this->module['box']['button_url'] = $module['box']['button_url'] ?? '';
        $this->module['list']['active'] = $module['list']['active'] ?? '';
        $this->module['list']['tittle'] = $module['list']['tittle'] ?? '';
        $this->module['list']['text'] = $module['list']['text'] ?? '';
        $this->module['list']['button_text'] = $module['list']['button_text'] ?? '';
        $this->module['list']['button_url'] = $module['list']['button_url'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.gifts');
    }
}
