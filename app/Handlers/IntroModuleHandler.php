<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class IntroModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::INTRO;
    const ACTIVE = false;
    const FIXED =  true;
    const INDEX = 0;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
        'stamp_image' => ''
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'stamp_image' => $rootFolder . '/' . $moduleFolder . '/stamp_image',
        ];
    }
}