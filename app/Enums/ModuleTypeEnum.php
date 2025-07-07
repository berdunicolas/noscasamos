<?php

namespace App\Enums;

use App\Enums\ModuleTypeEnum as EnumsModuleTypeEnum;
use App\Enums\ModuleTypeEnum as AppEnumsModuleTypeEnum;

enum ModuleTypeEnum: string
{
    case INTRO = 'INTRO';
    case MUSIC = 'MUSIC';
    case FLOAT_BUTTON = 'FLOAT_BUTTON';
    case COVER = 'COVER';
    case GUEST = 'GUEST';
    case SAVE_DATE = 'SAVE_DATE';
    case WELCOME = 'WELCOME';
    case EVENTS = 'EVENTS';
    case HISTORY ='HISTORY';
    case INFO = 'INFO';
    case HIGHLIGHTS = 'HIGHLIGHTS';
    case INTERACTIVE = 'INTERACTIVE';
    case VIDEO = 'VIDEO';
    case SUGGESTIONS = 'SUGGESTIONS';
    case GALERY = 'GALERY';
    case GIFTS ='GIFTS';
    case CONFIRMATION = 'CONFIRMATION';
    case FOOT = 'FOOT';

    public static function keys(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function keyValue(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }

    public static function getDisplayName(SELF $case): string
    {
        return match ($case) {
            self::INTRO => 'Intro Animada',
            self::MUSIC => 'Música',
            self::FLOAT_BUTTON => 'Botón Flotante',
            self::COVER => 'Portada',
            self::GUEST => 'Invitado',
            self::SAVE_DATE => 'Save The Date',
            self::WELCOME => 'Bienvenida',
            self::EVENTS => 'Eventos',
            self::HISTORY =>'Historia',
            self::INFO => 'Info',
            self::HIGHLIGHTS => 'Destacado',
            self::INTERACTIVE => 'Interactivos',
            self::VIDEO => 'Video',
            self::SUGGESTIONS => 'Sugerencias',
            self::GALERY => 'Galería',
            self::GIFTS =>'Regalos',
            self::CONFIRMATION => 'Confirmación',
            self::FOOT => 'Footer',
            default =>  null,
        };
    }

    public static function typesAndDisplayNames(){
        return [
            ['type' => self::INTRO, 'display_name' => 'Intro Animada'],
            ['type' => self::MUSIC, 'display_name' => 'Música'],
            ['type' => self::FLOAT_BUTTON, 'display_name' => 'Botón Flotante'],
            ['type' => self::COVER, 'display_name' => 'Portada'],
            ['type' => self::GUEST, 'display_name' => 'Invitado'],
            ['type' => self::SAVE_DATE, 'display_name' => 'Save The Date'],
            ['type' => self::WELCOME, 'display_name' => 'Bienvenida'],
            ['type' => self::EVENTS, 'display_name' => 'Eventos'],
            ['type' => self::HISTORY, 'display_name' =>'Historia'],
            ['type' => self::INFO, 'display_name' => 'Info'],
            ['type' => self::HIGHLIGHTS, 'display_name' => 'Destacado'],
            ['type' => self::INTERACTIVE, 'display_name' => 'Interactivos'],
            ['type' => self::VIDEO, 'display_name' => 'Video'],
            ['type' => self::SUGGESTIONS, 'display_name' => 'Sugerencias'],
            ['type' => self::GALERY, 'display_name' => 'Galería'],
            ['type' => self::GIFTS, 'display_name' =>'Regalos'],
            ['type' => self::CONFIRMATION, 'display_name' => 'Confirmación'],
            ['type' => self::FOOT, 'display_name' => 'Footer'],
        ];
    }
}
