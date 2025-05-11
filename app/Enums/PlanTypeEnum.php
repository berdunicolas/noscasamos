<?php

namespace App\Enums;

enum PlanTypeEnum: string
{
    case CLÁSICO = 'Clásico';
    case PLATINO = 'Platino';
    case GOLD = 'Gold';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
