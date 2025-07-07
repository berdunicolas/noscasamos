<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class InfoModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::INFO;
    const ACTIVE = false;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
        'on_t_right' => true,
        'icon' => '',
        'image' => '',
        'tittle' => '',
        'text' => '',
        /*'button_icon' => '',
        'button_text' => '',
        'button_url' => '',*/
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'image' => $rootFolder . '/' . $moduleFolder . '/image',
        ];
    }
}