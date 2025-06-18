<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class HistoryModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::HISTORY;
    const ACTIVE = false;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::PLATINO->value;

    const DATA = [
        'icon' => '',
        'image' => '',
        'tittle' => 'Nuestra Historia',
        'text' => '',
        'button_icon' => 'aydxrkfl',
        'button_text' => '',
        'button_url' => '',
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'image' => $rootFolder . '/' . $moduleFolder . '/image',
        ];
    }
}