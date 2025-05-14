<?php

namespace App\View\Components\ModuleForms;

use App\Enums\ModuleTypeEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Gifts extends Component
{
    public string $id = ModuleTypeEnum::GIFTS['name'] . '-module-form';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $invitationId,
        public array $module = [],
        public string $moduleName = ModuleTypeEnum::GIFTS['name'],
    ) {
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
        $this->module['second_account']['button_url'] = $module['second_account']['button_url'] ?? '';
        $this->module['second_account']['button_text'] = $module['second_account']['button_text'] ?? '';
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
        $this->module['list']['product_1'] = $module['list']['product_1'] ?? '';
        $this->module['list']['product_url_1'] = $module['list']['product_url_1'] ?? '';
        $this->module['list']['product_price_1'] = $module['list']['product_price_1'] ?? '';
        $this->module['list']['product_image_1'] = $module['list']['product_image_1'] ?? '';
        $this->module['list']['product_2'] = $module['list']['product_2'] ?? '';
        $this->module['list']['product_url_2'] = $module['list']['product_url_2'] ?? '';
        $this->module['list']['product_price_2'] = $module['list']['product_price_2'] ?? '';
        $this->module['list']['product_image_2'] = $module['list']['product_image_2'] ?? '';
        $this->module['list']['product_3'] = $module['list']['product_3'] ?? '';
        $this->module['list']['product_url_3'] = $module['list']['product_url_3'] ?? '';
        $this->module['list']['product_price_3'] = $module['list']['product_price_3'] ?? '';
        $this->module['list']['product_image_3'] = $module['list']['product_image_3'] ?? '';
        $this->module['list']['product_4'] = $module['list']['product_4'] ?? '';
        $this->module['list']['product_url_4'] = $module['list']['product_url_4'] ?? '';
        $this->module['list']['product_price_4'] = $module['list']['product_price_4'] ?? '';
        $this->module['list']['product_image_4'] = $module['list']['product_image_4'] ?? '';
        $this->module['list']['product_5'] = $module['list']['product_5'] ?? '';
        $this->module['list']['product_url_5'] = $module['list']['product_url_5'] ?? '';
        $this->module['list']['product_price_5'] = $module['list']['product_price_5'] ?? '';
        $this->module['list']['product_image_5'] = $module['list']['product_image_5'] ?? '';
        $this->module['list']['product_6'] = $module['list']['product_6'] ?? '';
        $this->module['list']['product_url_6'] = $module['list']['product_url_6'] ?? '';
        $this->module['list']['product_price_6'] = $module['list']['product_price_6'] ?? '';
        $this->module['list']['product_image_6'] = $module['list']['product_image_6'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.module-forms.gifts');
    }
}
