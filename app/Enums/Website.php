<?php

namespace App\Enums;

enum Website: string
{
    case LandingPage = 'Landing Page';
    case SalesPage = 'Sales Page';
    case Ecommerce = 'E-commerce';
    case StarterWebsite = 'Starter Website';
    case CorporateWebsite = 'Corporate Website';
    case Other = 'Other';
}
