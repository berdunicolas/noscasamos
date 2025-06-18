<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class SaveDateModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::SAVE_DATE;
    const ACTIVE = true;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
        'tittle' => 'Agendá la fecha',
        'icon' => 'mzfjzfjs',
        'text_button' => 'Agendar fecha',
        'is_countdown' => true,
        'days_tanslation' => 'Días',
        'hr_tanslation' => 'Hs',
        'min_translation' => 'Min',
        'sec_translation' => 'Seg',
    ];
}