<?php

namespace App\Enums;

enum StyleTypeEnum: string
{
    case LIGHT = 'Light';
    case DARK = 'Dark';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
