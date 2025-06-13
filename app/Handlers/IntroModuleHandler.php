<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class IntroModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::INTRO;
    const FIXED =  true;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
        'stamp_image' => ''
    ];

    static function getMediaCollections(string $name): array{
        return [
            $name,
        ];
    }
}