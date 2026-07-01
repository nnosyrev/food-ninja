<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedirectStatistics extends Model
{
    public function redirectedUrl(): BelongsTo
    {
        return $this->belongsTo(RedirectedUrl::class);
    }
}
