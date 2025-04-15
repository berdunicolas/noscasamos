<?php

namespace App\Enums;

enum PlanTypeEnum: string
{
    case CLÁSICO = 'Clásico';
    case GOLD = 'Gold';
    case PLATINO = 'Platino';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
