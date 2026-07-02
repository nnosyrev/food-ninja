<?php

namespace App\Services\UrlShortener;

use App\Models\User;

interface UrlShortenerInterface
{
    public function generateShortUrlHash(User $user, string $origUrl): string;

    public function generateShortUrlByHash(string $hash): string;
}
