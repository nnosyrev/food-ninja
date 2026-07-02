<?php

namespace App\Services\UrlShortener;

use App\Models\User;
use Illuminate\Routing\UrlGenerator;

class SimpleUrlShortener implements UrlShortenerInterface
{
    public function __construct(private readonly UrlGenerator $urlGenerator) {}

    public function generateShortUrlHash(User $user, string $origUrl): string
    {
        return \substr(\md5($user->id . $origUrl . microtime()), 0, 8);
    }

    public function generateShortUrlByHash(string $hash): string
    {
        return $this->urlGenerator->route('redirecting_url', ['hash' => $hash]);
    }
}
