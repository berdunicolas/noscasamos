<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class FootModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::FOOT;
    const ACTIVE = true;
    const FIXED =  true;
    const INDEX = 100;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
        'foot_text' => 'Hecho con <i class="fa-regular fa-heart"></i> por',
    ];
}