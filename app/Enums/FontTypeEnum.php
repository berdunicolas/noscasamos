<?php

namespace App\Enums;

enum FontTypeEnum: string
{
    case clasic = 'clasic';
    case minimal = 'minimal';
    case script = 'script';
    case deco = 'deco';
    case display = 'display';
    case fiber = 'fiber';

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

    public static function getFont($case): string
    {
        return match ($case) {
            self::clasic => '"Old Standard TT", serif;',
            self::minimal => '"Poppins", sans-serif;',
            self::script => '"Sacramento", cursive;',
            self::deco => '"Parisienne", cursive;',
            self::display => '"Abril Fatface", cursive;',
            self::fiber => '"Permanent Marker", cursive;',
        };
    }
}
