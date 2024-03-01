<?php

namespace App\Enums;

enum Status: string
{
    case New = 'New';
    case Negotiating = 'Negotiating';
    case Lost = 'Lost';
    case Won = 'Won';
    case KIV = 'KIV';
}
