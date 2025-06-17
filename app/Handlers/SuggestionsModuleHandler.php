<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class SuggestionsModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::SUGGESTIONS;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::GOLD->value;

    const DATA = [
        'pre_tittle' => 'Sugerencias',
        'tittle' => 'Alojamientos',
        'text' => '¿Estarás de visita en la ciudad?<br> Te recomendamos algunos lugares para hospedarte.',
        'icon' => 'kjeyqivm',
        'suggestions' => []
    ];
}