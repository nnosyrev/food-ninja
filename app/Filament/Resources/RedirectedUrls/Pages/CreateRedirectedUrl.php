<?php

namespace App\Filament\Resources\RedirectedUrls\Pages;

use App\Filament\Resources\RedirectedUrls\RedirectedUrlResource;
use App\Services\UrlShortener\UrlShortenerInterface;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateRedirectedUrl extends CreateRecord
{
    private UrlShortenerInterface $urlShortener;

    public function boot(UrlShortenerInterface $urlShortener)
    {
        $this->urlShortener = $urlShortener;
    }

    protected static string $resource = RedirectedUrlResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        $data['short_url'] = $this->urlShortener->generateShortUrl($data['orig_url']);

        return $data;
    }
}
