<?php

namespace App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Pages;

use App\Filament\Resources\RedirectedUrls\Pages\ListRedirectedUrls;
use App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\RedirectStatisticsResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListRedirectedStatistics extends ListRecords
{
    protected static string $resource = RedirectStatisticsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Ссылки')
                ->url(
                    fn(): string => ListRedirectedUrls::getUrl()
                ),
        ];
    }
}
