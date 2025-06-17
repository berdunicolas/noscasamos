<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class GuestModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::GUEST;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
        'tittle' => '',
        'icon' => '',
        'signs' => '',
    ];
}