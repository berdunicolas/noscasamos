<?php

namespace App\Enums;

enum FontTypeEnum: string
{
    case MINIMALISTA = 'Minimalista';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
