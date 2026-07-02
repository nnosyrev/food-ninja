<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedirectedUrl extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'orig_url',
        'hash',
    ];

    public function redirectStatistics(): HasMany
    {
        return $this->hasMany(RedirectStatistics::class);
    }
}
