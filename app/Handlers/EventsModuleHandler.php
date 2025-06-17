<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class EventsModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::EVENTS;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
        'civil' => [
            'active' => false,
            'event' => 'Civil',
            'icon' => 'czmrowis',
            'order' => '',
            'date' => '',
            'time' => '',
            'hr_translation' => 'Horas',
            'name' => '',
            'detail' => '',
            'button_url' => '',
            'button_text' => 'Cómo llegar',
            'image' => '',
        ],
        'ceremony' => [
            'active' => false,
            'event' => 'Ceremonia',
            'icon' => 'fshosubk',
            'order' => '',
            'date' => '',
            'time' => '',
            'hr_translation' => 'Horas',
            'name' => '',
            'detail' => '',
            'button_url' => '',
            'button_text' => 'Cómo llegar',
            'image' => '',
        ],
        'party' => [
            'active' => false,
            'event' => 'Festejo',
            'icon' => 'yvgmrqny',
            'order' => '',
            'date' => '',
            'time' => '',
            'hr_translation' => 'Horas',
            'name' => '',
            'detail' => '',
            'button_url' => '',
            'button_text' => 'Cómo llegar',
            'image' => '',
        ],
        'dresscode' => [
            'active' => false,
            'event' => 'Dress Code',
            'icon' => 'dkyhucjt',
            'order' => '',
            'name' => '',
            'detail' => '',
            'button_url' => '',
            'button_text' => '',
            'image' => '',
        ],
    ];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'civil_image' => $rootFolder . '/' . $moduleFolder . '/civil_image',
            'ceremony_image' => $rootFolder . '/' . $moduleFolder . '/ceremony_image',
            'party_image' => $rootFolder . '/' . $moduleFolder . '/party_image',
            'dresscode_image' => $rootFolder . '/' . $moduleFolder . '/dresscode_image',
        ];
    }
}