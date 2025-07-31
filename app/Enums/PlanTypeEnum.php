<?php

namespace App\Enums;

enum PlanTypeEnum: string
{
    case GOLD = 'Gold';
    case PLATINO = 'Platino';
    case CLÁSICO = 'Clásico';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
