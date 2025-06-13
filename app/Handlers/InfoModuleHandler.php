<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class InfoModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::INFO;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
        'on_t_right' => true,
        'icon' => '',
        'image' => '',
        'tittle' => '',
        'text' => '',
        'button_icon' => '',
        'button_text' => '',
        'button_url' => '',
    ];

    static function getMediaCollections(string $name): array{
        return [
            $name,
        ];
    }
}