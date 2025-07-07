<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class MusicModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::MUSIC;
    const ACTIVE = false;
    const FIXED =  true;
    const INDEX = 1;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::GOLD->value;

    const DATA = [
        'song' => ''
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'song' => $rootFolder . '/' . $moduleFolder . '/song',
        ];
    }
}