<?php

namespace App\Services\UrlShortener;

interface UrlShortenerInterface
{
    public function generateShortUrl(string $origUrl): string;
}
