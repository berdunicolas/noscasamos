<?php

namespace App\Enums;

enum SpacingTypeEnum: string
{
    case AMPLIO = 'Amplio';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
