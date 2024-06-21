<?php

namespace App\Enum;

enum RightsEnum: string
{
    CASE AP = 'Всем посетителям';
    CASE AU = 'Всем пользователям';
    CASE FS = 'Друзьям и подписчикам';
    CASE FR = 'Только друзьям';
    CASE ME = 'Только мне';

    public static function getEnums() : array
    {
        return [
            self::AP->value,
            self::AU->value,
            self::FS->value,
            self::FR ->value,
            self::ME ->value,
        ];
    }
}
