<?php

namespace App\Services\UrlShortener;

use App\Models\RedirectedUrl;
use App\Models\User;
use Exception;
use Illuminate\Routing\UrlGenerator;

class SimpleUrlShortener implements UrlShortenerInterface
{
    private const int LENGTH = 8;
    private const int MAX_ATTEMPTS = 5;

    public function __construct(private readonly UrlGenerator $urlGenerator) {}

    public function generateShortUrlHash(User $user, string $origUrl): string
    {
        $attempts = 0;

        do {
            $attempts++;

            if ($attempts > self::MAX_ATTEMPTS) {
                throw new Exception(\sprintf('The number of attempts at generating a short url exceeded the maximum allowed (%s)', self::MAX_ATTEMPTS));
            }

            $hash = $this->doGenerateShortUrlHash($user, $origUrl);

        } while ($this->checkHashExistense($hash));

        return $hash;
    }

    public function generateShortUrlByHash(string $hash): string
    {
        return $this->urlGenerator->route('redirecting_url', ['hash' => $hash]);
    }

    private function checkHashExistense(string $hash): bool
    {
        return RedirectedUrl::byHash($hash)->exists();
    }

    private function doGenerateShortUrlHash(User $user, string $origUrl): string
    {
        return \substr(\md5($user->id . $origUrl . microtime()), 0, self::LENGTH);
    }
}
