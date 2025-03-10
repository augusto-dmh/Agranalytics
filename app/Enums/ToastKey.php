<?php

namespace App\Enums;

enum ToastKey: string
{
    case SUCCESS = 'success';
    case FAIL = 'fail';
    case INFO = 'info';
    case WARNING = 'warning';

    public static function getEnumValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
