<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class GaleryModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::GALERY;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::GOLD->value;

    const DATA = [
        'icon' => 'wsaaegar',
        'tittle' => 'Álbum de Fotos',
        'pre_tittle' => 'Momentos únicos',
        'galery_images' => [],
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'galery_images' => $rootFolder . '/' . $moduleFolder . '/galery_images',
        ];
    }
}