<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class FloatButtonModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::FLOAT_BUTTON;
    const FIXED =  true;
    const IS_UNIQUE = true;
    const PLAN = 'default';
    
    const DATA = [
        'type_button' => '',
        'url_button' => '',
        'icon_button' => '',
    ];
}