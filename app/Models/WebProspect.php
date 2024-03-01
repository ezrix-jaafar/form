<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebProspect extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'web_sales_rep_id' => 'integer',
    ];

    public function webSalesRep(): BelongsTo
    {
        return $this->belongsTo(WebSalesRep::class);
    }
}
