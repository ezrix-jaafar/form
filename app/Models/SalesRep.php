<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalesRep extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
    ];

    public function prospects(): HasMany
    {
        return $this->hasMany(Prospect::class);
    }
}
