<?php

namespace App\Filament\Resources\RedirectedUrls\Pages;

use App\Filament\Resources\RedirectedUrls\RedirectedUrlResource;
use App\Services\UrlShortener\UrlShortenerInterface;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Auth\Guard;

class CreateRedirectedUrl extends CreateRecord
{
    private UrlShortenerInterface $urlShortener;
    private Guard $guard;

    public function boot(UrlShortenerInterface $urlShortener, Guard $guard)
    {
        $this->urlShortener = $urlShortener;
        $this->guard = $guard;
    }

    protected static string $resource = RedirectedUrlResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = $this->guard->user();

        $data['user_id'] = $user->id;
        $data['hash'] = $this->urlShortener->generateShortUrlHash($user, $data['orig_url']);

        return $data;
    }
}
