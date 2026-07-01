<?php

namespace App\Filament\Resources\RedirectedUrls\Pages;

use App\Filament\Resources\RedirectedUrls\RedirectedUrlResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditRedirectedUrl extends EditRecord
{
    protected static string $resource = RedirectedUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
