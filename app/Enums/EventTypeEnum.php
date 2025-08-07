<?php

namespace App\Enums;

enum EventTypeEnum: string
{
    case BODA = 'Boda';
    case QUINCE = 'Quince';
    case CUMPLE = 'Cumple';
    case EMPRESA = 'Empresa';
    case INFANTIL = 'Infantil';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
