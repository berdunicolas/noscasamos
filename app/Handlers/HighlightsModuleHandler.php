<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class HighlightsModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::HIGHLIGHTS;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
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