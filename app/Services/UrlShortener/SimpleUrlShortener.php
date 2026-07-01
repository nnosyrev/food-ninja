<?php

namespace App\Services\UrlShortener;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimpleUrlShortener implements UrlShortenerInterface
{
    public function __construct(private readonly Request $request) {}

    public function generateShortUrl(string $origUrl): string
    {
        return $this->request->schemeAndHttpHost() . '/' . \substr(\md5($this->getUserId() . $origUrl . microtime()), 0, 8);
    }

    private function getUserId(): int
    {
        return Auth::id();
    }
}
