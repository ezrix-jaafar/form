<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebSalesRep extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
    ];

    public function webProspects(): HasMany
    {
        return $this->hasMany(WebProspect::class);
    }
}
