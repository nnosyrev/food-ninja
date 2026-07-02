<?php

namespace App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RedirectStatisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ip')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
