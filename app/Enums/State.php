<?php

namespace App\Enums;

enum State: string
{
    case Johor = 'Johor';
    case Kedah = 'Kedah';
    case Kelantan = 'Kelantan';
    case Melaka = 'Melaka';
    case NegeriSembilan = 'Negeri Sembilan';
    case Pahang = 'Pahang';
    case Perak = 'Perak';
    case Perlis = 'Perlis';
    case PulauPinang = 'Pulau Pinang';
    case Sabah = 'Sabah';
    case Sarawak = 'Sarawak';
    case Selangor = 'Selangor';
    case Terengganu = 'Terengganu';
    case KualaLumpur = 'Kuala Lumpur';
    case Labuan = 'Labuan';
    case Putrajaya = 'Putrajaya';
 public static function toSelectArray(): \Illuminate\Support\Collection
{
    return collect([
        self::Johor->value => 'Johor',
        self::Kedah->value => 'Kedah',
        self::Kelantan->value => 'Kelantan',
        self::Melaka->value => 'Melaka',
        self::NegeriSembilan->value => 'Negeri Sembilan',
        self::Pahang->value => 'Pahang',
        self::Perak->value => 'Perak',
        self::Perlis->value => 'Perlis',
        self::PulauPinang->value => 'Pulau Pinang',
        self::Sabah->value => 'Sabah',
        self::Sarawak->value => 'Sarawak',
        self::Selangor->value => 'Selangor',
        self::Terengganu->value => 'Terengganu',
        self::KualaLumpur->value => 'Kuala Lumpur',
        self::Labuan->value => 'Labuan',
        self::Putrajaya->value => 'Putrajaya',
    ]);
}
}
