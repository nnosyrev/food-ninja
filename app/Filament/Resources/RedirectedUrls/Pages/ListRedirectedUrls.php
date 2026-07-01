<?php

namespace App\Filament\Resources\RedirectedUrls\Pages;

use App\Filament\Resources\RedirectedUrls\RedirectedUrlResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRedirectedUrls extends ListRecords
{
    protected static string $resource = RedirectedUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
