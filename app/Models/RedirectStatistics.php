<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class RedirectStatistics extends Model
{
    public function redirectedUrl(): BelongsTo
    {
        return $this->belongsTo(RedirectedUrl::class);
    }

    public static function createCompleted(RedirectedUrl $redirectedUrl, Request $request): self
    {
        $redirectStatistics = new self();
        $redirectStatistics->redirectedUrl()->associate($redirectedUrl);
        $redirectStatistics->ip = $request->ip();
        $redirectStatistics->save();

        return $redirectStatistics;
    }
}
