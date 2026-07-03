<?php

namespace App\Filament\Resources\RedirectedUrls\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RedirectedUrlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('orig_url')
                    ->label('Оригинальный URL')
                    ->url()
                    ->required(),
            ]);
    }
}
