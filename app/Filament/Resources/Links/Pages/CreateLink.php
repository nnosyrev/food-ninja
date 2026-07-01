<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinkResource;
use App\Services\UrlShortener\UrlShortenerInterface;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateLink extends CreateRecord
{
    private UrlShortenerInterface $urlShortener;

    protected static string $resource = LinkResource::class;

    public function boot(UrlShortenerInterface $urlShortener)
    {
        $this->urlShortener = $urlShortener;
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        $data['short_link'] = $this->urlShortener->generateShortUrl($data['orig_link']);

        return $data;
    }
}
