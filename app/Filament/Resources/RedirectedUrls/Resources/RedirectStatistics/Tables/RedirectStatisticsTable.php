<?php

namespace App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Webteractive\FilamentBrowserTimezone\BrowserTimezone;

class RedirectStatisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ip')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Дата перехода')
                    ->dateTime()
                    ->timezone(BrowserTimezone::get())
                    ->alignEnd()
                    ->sortable(),
            ]);
    }
}
