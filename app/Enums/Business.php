<?php

namespace App\Enums;

enum Business: string
{
    case Service = 'Service';
    case Product = 'Product';
    case Fashion = 'Fashion';
    case FnB = 'FnB';
    case NGO = 'NGO';
    case GovernmentOrganization = 'Government Organization';
    case Others = 'Others';

    public static function toSelectArray(): array
    {
        return [
            self::Service->value => 'Service',
            self::Product->value => 'Product',
            self::Fashion->value => 'Fashion',
            self::FnB->value => 'FnB',
            self::NGO->value => 'NGO',
            self::GovernmentOrganization->value => 'Government Organization',
            self::Others->value => 'Others',
        ];
    }
}
