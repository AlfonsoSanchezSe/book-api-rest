<?php

namespace App\Enums;

enum BookType: string
{
    case DRAMA = 'DRAMA';
    case SCIFI = 'SCIFI';
    case MANGA = 'MANGA';
    case SPORTS = 'SPORTS';
    case COOKING = 'COOKING';



    public static function values(): array {
    
        return array_column(self::cases(), 'value');
    }
}