<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class InteractiveModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::INTERACTIVE;
    const ACTIVE = false;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::PLATINO->value;

    const DATA = [
        'spotify' => [
            'active' => false,
            'icon' => 'xsiktwiz',
            'order' => '',
            'tittle' => 'Nuestra Playlist',
            'text' => 'Sumate a nuestra playlist y recomendá las canciones que no pueden faltar en la fiesta.',
            'button_icon' => '',
            'button_text' => 'Ir a Spotify',
            'button_url' => '',
        ],
        'hashtag' => [
            'active' => false,
            'icon' => 'tgyvxauj',
            'order' => '',
            'tittle' => '',
            'text' => 'Sumate a la boda compartiendo fotos y videos con nuestro hashtag.',
            'button_icon' => '',
            'button_text' => 'Ir a Instagram',
            'button_url' => '',
        ],
        'ig' => [
            'active' => false,
            'icon' => 'tgyvxauj',
            'order' => '',
            'tittle' => '',
            'text' => 'Seguinos en nuestra cuenta de instagram.',
            'button_icon' => '',
            'button_text' => 'Ir a Instagram',
            'button_url' => '',
        ],
        'link' => [
            'active' => false,
            'icon' => '',
            'order' => '',
            'tittle' => '',
            'text' => '',
            'button_icon' => '',
            'button_text' => '',
            'button_url' => '',
        ],
    ];
}