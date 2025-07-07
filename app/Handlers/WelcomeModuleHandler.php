<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class WelcomeModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::WELCOME;
    const ACTIVE = false;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
        'tittle' => '',
        'icon' => 'aydxrkfl',
        'text' => '',
        'image' => '',
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'image' => $rootFolder . '/' . $moduleFolder . '/image',
        ];
    }
}