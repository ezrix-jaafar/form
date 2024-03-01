<?php

namespace App\Enums;

enum Role: string
{
    case Owner = 'Owner';
    case Stockist = 'Stockist';
    case Agent = 'Agent';
    case Staff = 'Staff';
}
