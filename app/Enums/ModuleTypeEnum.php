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
            default =>  null,
        };
    }

    public static function typesAndDisplayNames(){
        return [
            ['type' => self::INTRO->value, 'display_name' => 'Intro Animada'],
            ['type' => self::MUSIC->value, 'display_name' => 'Música'],
            ['type' => self::FLOAT_BUTTON->value, 'display_name' => 'Botón Flotante'],
            ['type' => self::COVER->value, 'display_name' => 'Portada'],
            ['type' => self::GUEST->value, 'display_name' => 'Invitado'],
            ['type' => self::SAVE_DATE->value, 'display_name' => 'Save The Date'],
            ['type' => self::WELCOME->value, 'display_name' => 'Bienvenida'],
            ['type' => self::EVENTS->value, 'display_name' => 'Eventos'],
            ['type' => self::HISTORY->value, 'display_name' =>'Historia'],
            ['type' => self::INFO->value, 'display_name' => 'Info'],
            ['type' => self::HIGHLIGHTS->value, 'display_name' => 'Destacado'],
            ['type' => self::INTERACTIVE->value, 'display_name' => 'Interactivos'],
            ['type' => self::VIDEO->value, 'display_name' => 'Video'],
            ['type' => self::SUGGESTIONS->value, 'display_name' => 'Sugerencias'],
            ['type' => self::GALERY->value, 'display_name' => 'Galería'],
            ['type' => self::GIFTS->value, 'display_name' =>'Regalos'],
            ['type' => self::CONFIRMATION->value, 'display_name' => 'Confirmación'],
        ];
    }
}
