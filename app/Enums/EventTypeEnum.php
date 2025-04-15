<?php

namespace App\Enums;

enum EventTypeEnum: string
{
    case QUINCE = 'Quince';
    case CUMPLE = 'Cumple';
    case BODA = 'Boda';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
