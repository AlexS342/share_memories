<?php

namespace App\Enum;

enum GenderEnum:string
{
    CASE MN = 'man';
    CASE WN = 'woman';

    public static function getEnums() : array
    {
        return [
            self::MN->value,
            self::WN->value,
        ];
    }
}
