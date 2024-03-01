<?php

namespace App\Enums;

enum Sale: string
{
    case BelowRM10k = 'Below RM10,000';
    case AboveRM10k = 'Above RM10,000';

    public static function toSelectArray(): array
    {
        return [
            self::BelowRM10k->value => 'Below RM10,000',
            self::AboveRM10k->value => 'Above RM10,000',
        ];
    }
}
